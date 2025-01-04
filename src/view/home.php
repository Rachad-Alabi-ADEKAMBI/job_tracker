
<?php $title = "Job Application Tracker";

ob_start(); ?>

<main class="main">
    <div class="job-tracker">
        <header>
            <h1>Job Application Tracker</h1>
            <div class="header-actions">
                <button id="searchToggle" class="btn btn-icon" @click='displaySearch()'>
                    <i class="fas fa-search"></i>
                </button>
                <button id="toggleForm"  @click='displayNewJobForm()' class="btn btn-primary">Add New Application</button>
            </div>
        </header>
        
        <div id="searchBar" class="search-bar" v-if='showSearchBar' >
            <input type="text" id="searchInput" placeholder="Search applications..." >
            <button id="closeSearch" class="btn btn-icon" @click='closeSearch()'>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div id="jobForm" class="job-form"  v-if='showNewJobForm'>
            <div class="form-header">
                <h2>Add New Job Application</h2>
                <button id="closeForm" class="btn btn-close" @click='closeNewJobForm()' >&times;</button>
            </div>
            <form>
                <div class="form-group">
                    <label for="company">Company:</label>
                    <input type="text" id="company" v-model="form.company" required>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" id="position" v-mode="form.position" required>
                </div>
                <div class="form-group">
                    <label for="dateApplied">Date Applied:</label>
                    <input type="date" id="dateApplied" v-model="form.dateApplied" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" v-model="form.status" required>
                        <option value="applied">Applied</option>
                        <option value="interviewing">Interviewing</option>
                        <option value="offered">Offered</option>
                        <option value="rejected">Rejected</option>
                        <option value="accepted">Accepted</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Add Application</button>
            </form>
        </div>

        <div id="jobForm" class="job-form"  v-if='showUpdateJobForm'>
            <div class="form-header">
                <h2>Update Job Application</h2>
                <button id="closeForm" class="btn btn-close" @click='updateJob()' >&times;</button>
            </div>
            <form >
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" v-model="form.status" required>
                        <option value="applied">Applied</option>
                        <option value="interviewing">Interviewing</option>
                        <option value="offered">Offered</option>
                        <option value="rejected">Rejected</option>
                        <option value="accepted">Accepted</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update job</button>
            </form>
        </div>

        <div class="job-list" v-if='showJobs'>
            <h2>Applied Jobs</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Company">Tech Co</td>
                            <td data-label="Position">Frontend Developer</td>
                            <td data-label="Date Applied">2023-06-01</td>
                            <td data-label="Status"><span class="status applied">Applied </span></td> 
                            <td>
                            <i class="fas fa-pen" @click='displayUpdateJobForm()'></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                <button class="btn btn-secondary">Previous</button>
                <span>Page 1 of 3</span>
                <button class="btn btn-secondary">Next</button>
            </div>
        </div>
    </div>
</main>

<script>
    const { createApp } = Vue;

    createApp({
        data() {
            return {
                showNewJobForm: false,
                showUpdateJobForm: false,
                showJobs: false,
                showSearchBar: false,
                message: '',
                role: '',
                jobs: '',
                form: {
                     company: '',
                    position: '',
                    date_applied: '',
                    status: ''
                }
            };
        },
        mounted() {
            this.displayJobs();
        },
        
        methods: {
            submitForm(){
                const formData = new FormData();
                    formData.append('company', this.form.company);
                    formData.append('position', this.form.position);
                    formData.append('date_applied', this.form.date_applied);
                    formData.append('status', this.form.status);

                    console.log('Données envoyées :', Object.fromEntries(formData));

                    axios.post('inddex.php?action=addNewJob', formData)
                        .then(response => {
                            // console.log(response.data.role);  
                            console.log('job added !')
                        })
                        .catch(error => {
                            console.error('Erreur Axios :', error);
                            this.message = 'Erreur lors de la connexion.';
                        });
            },
            displayNewJobForm(){
                this.showJobs = false;
                this.showNewJobForm = true;
                this.showUpdateJob = false;
            },
            closeNewJobForm(){
                this.showJobs = true;
                this.showNewJobForm = false;
                this.showUpdateJob = false;
            },
            displayJobs(){
                axios.get('index.php?action=getJobs')
                    .then((response) => {
                        if (Array.isArray(response.data) && response.data.length > 0) {
                            this.jobs = response.data;
                            console.log(response.data)

                        } else {
                            console.warn('No data found in API response.');
                        }
                    })
                    .catch((error) => {
                        console.error('Error fetching user data:', error);
                    });
                this.showJobs = true;
                this.showNewJobForm = false;
                this.showUpdateJob = false;
            },
            displayUpdateJobForm(){
                this.showJobs = false;
                this.showNewJobForm = false;
                this.showUpdateJobForm = true;
            }, 
            closeUpdateJobForm(){
                this.showJobs = true;
                this.showNewJobForm = false;
                this.showUpdateJobForm = false;
            }, 
            displaySearch(){
                this.showSearchBar = true;
                this.showUpdateJobForm = false;
                this.showNewJobForm = false;
            },
            closeSearch(){
                this.showSearchBar = false;
                this.showUpdateJobForm = false;
                this.showNewJobForm = false;
            }
     }
    }).mount('#app');
</script>
    
<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>