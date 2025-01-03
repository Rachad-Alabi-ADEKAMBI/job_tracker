
<?php $title = "Job Application Tracker";

ob_start(); ?>

<main class="main">
<div class="job-tracker">
        <header>
            <h1>Job Application Tracker</h1>
            <div class="header-actions">
                <button id="searchToggle" class="btn btn-icon" aria-label="Toggle search">
                    <i class="fas fa-search"></i>
                </button>
                <button id="toggleForm"  @click='displayNewJob()' class="btn btn-primary">Add New Application</button>
            </div>
        </header>
        
        <div id="searchBar" class="search-bar" style="display: none;">
            <input type="text" id="searchInput" placeholder="Search applications...">
            <button id="closeSearch" class="btn btn-icon" aria-label="Close search">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div id="jobForm" class="job-form" style="display: none;">
            <div class="form-header">
                <h2>Add New Job Application</h2>
                <button id="closeForm" class="btn btn-close">&times;</button>
            </div>
            <form>
                <div class="form-group">
                    <label for="company">Company:</label>
                    <input type="text" id="company" name="company" required>
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" id="position" name="position" required>
                </div>
                <div class="form-group">
                    <label for="dateApplied">Date Applied:</label>
                    <input type="date" id="dateApplied" name="dateApplied" required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
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

        <div class="job-list">
            <h2>Applied Jobs</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Company">Tech Co</td>
                            <td data-label="Position">Frontend Developer</td>
                            <td data-label="Date Applied">2023-06-01</td>
                            <td data-label="Status"><span class="status applied">Applied</span></td>
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
        document.getElementById('toggleForm').addEventListener('click', function() {
            var form = document.getElementById('jobForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });

        document.getElementById('closeForm').addEventListener('click', function() {
            var form = document.getElementById('jobForm');
            form.style.display = 'none';
        });

        document.getElementById('searchToggle').addEventListener('click', function() {
            var searchBar = document.getElementById('searchBar');
            searchBar.style.display = 'flex';
            document.getElementById('searchInput').focus();
        });

        document.getElementById('closeSearch').addEventListener('click', function() {
            var searchBar = document.getElementById('searchBar');
            searchBar.style.display = 'none';
        });
</script>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
    const { createApp } = Vue;

    createApp({
        data() {
            return {
                showAddForm: false,
                showUpdateForm: false,
                showJobs: false
                message: '',
                role: '',
                form: {
                     company: '',
                    position: '',
                    date_applied: '',
                    status: ''
                }
            };
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
                this.showNewJob = true;
                this.showUpdateJob = false;
            },
            displayJobs(){
                this.showJobs = true;
                this.showNewJob = false;
                this.showUpdateJob = false;
            },
            displayUpdateJob(){
                this.showJobs = false;
                this.showNewJob = false;
                this.showUpdateJob = true;
            }
      
     }
    }).mount('#app');
</script>
    
<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>