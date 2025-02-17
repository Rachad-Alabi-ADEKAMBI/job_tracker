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
                <button id="toggleForm" @click='displayNewJobForm()' class="btn btn-primary">Add New Application</button>
            </div>
        </header>

        <div id="searchBar" class="search-bar" v-if='showSearchBar'>
            <input type="text" id="searchInput" placeholder="Search applications...">
            <button id="closeSearch" class="btn btn-icon" @click='closeSearch()'>
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div id="jobForm" class="job-form" v-if='showNewJobForm'>
            <div class="form-header">
                <h2>Add New Job Application</h2>
                <button id="closeForm" class="btn btn-close" @click='closeNewJobForm()'>&times;</button>
            </div>
            <form @submit.prevent="newJob">
                <div class="form-group">
                    <label for="company">Company:</label>
                    <input type="text" id="company" v-model="form.company" required>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" id="position" v-model="form.position" required>
                </div>
                <div class="form-group">
                    <label for="dateApplied">Date Applied:</label>
                    <input type="date" id="date_applied" v-model="form.date_applied" required>
                </div>
                <button type="submit" class="btn btn-success">Add Application</button>
            </form>
        </div>

        <div id="jobForm" class="job-form" v-if='showUpdateJobForm'>
            <div class="form-header">
                <h2>Update Job Application</h2>
                <button id="closeForm" class="btn btn-close" @click='closeUpdateJobForm()'>&times;</button>
            </div>
            <form>
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

            <p>
                {{ message}}
            </p>
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
                        <tr v-for="job in jobs" :key="job.id">
                            <td data-label="Company">{{ job.company}}</td>
                            <td data-label="Position">{{ job.position}}</td>
                            <td data-label="Date Applied">{{job.date_applied}}</td>
                            <td data-label="Status"><span class="status applied">{{ job.status}}</span></td>
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
    const {
        createApp
    } = Vue;

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
                    date_applied: ''
                }
            };
        },
        mounted() {
            this.displayJobs();
        },

        methods: {
            newJob() {
                const formData = new FormData();
                formData.append('company', this.form.company);
                formData.append('position', this.form.position);
                formData.append('date_applied', this.form.date_applied);

                console.log('Données envoyées :', Object.fromEntries(formData));

                axios.post('index.php?action=addNewJob', formData)
                    .then(response => {
                        console.log('Réponse Axios :', response.data);
                        if (response.data.success) {
                            this.message = response.data.message;
                            this.displayJobs();
                        } else {
                            this.message = response.data.message;
                        }
                    })
                    .catch(error => {
                        console.error('Erreur Axios :', error);
                        this.message = 'Erreur lors de la connexion.';
                    });
            },
            displayNewJobForm() {
                this.showJobs = false;
                this.showNewJobForm = true;
                this.showUpdateJob = false;
            },
            closeNewJobForm() {
                this.showJobs = true;
                this.showNewJobForm = false;
                this.showUpdateJob = false;
            },
            displayJobs() {
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
            displayUpdateJobForm() {
                this.showJobs = false;
                this.showNewJobForm = false;
                this.showUpdateJobForm = true;
            },
            closeUpdateJobForm() {
                this.showJobs = true;
                this.showNewJobForm = false;
                this.showUpdateJobForm = false;
            },
            displaySearch() {
                this.showSearchBar = true;
                this.showUpdateJobForm = false;
                this.showNewJobForm = false;
            },
            closeSearch() {
                this.showSearchBar = false;
                this.showUpdateJobForm = false;
                this.showNewJobForm = false;
            }
        }
    }).mount('#app');
</script>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>