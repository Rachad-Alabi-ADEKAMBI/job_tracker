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
            <input type="text" id="searchInput" v-model="searchQuery" placeholder="Search applications...">
            <button id="closeSearch" class="btn btn-icon" @click='displayJobs()'>
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
                <button id="closeForm" class="btn btn-close" @click='displayJobs()'>&times;</button>
            </div>

            <p v-if="errorMessage" class="text text-danger">
                {{ errorMessage}}
            </p>

            <form @submit.prevent="updateJob">
                <div class="form-group">
                    <h2>
                        {{ form.position }} at {{ form.company }}
                    </h2>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" v-model="form.status" required>
                        <option value="interviewing">Interviewing</option>
                        <option value="offered">Offered</option>
                        <option value="rejected">Rejected</option>
                        <option value="accepted">Accepted</option>
                    </select>
                </div>
                <input type="hidden" id="job_id" v-model="form.id" value="form.id">
                <button type="submit" class="btn btn-success">Update job</button>
            </form>

        </div>

        <div class="job-list" v-if='showJobs'>

            <h2 v-if="showJobsTitle">All Aplications <span>({{this.jobs.length}})</span></h2>
            <h2 v-if="showResultsTitle">Results <span>({{this.filteredJobs.length}})</h2>


            <p v-if="successMessage" class="alert alert-success">
                {{ successMessage}}
            </p>

            <p v-if="errorMessage" class="alert alert">
                {{ errorMessage}}
            </p>


            <div class="table-responsive" v-if="filteredJobs.length > 0">
                <table>
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Date Applied</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="job in paginatedJobs" :key="job.id">
                            <td data-label="Company">{{ job.company }}</td>
                            <td data-label="Position">{{ job.position }}</td>
                            <td data-label="Date Applied">{{ job.date_applied }}</td>
                            <td data-label="Status">
                                <span :class="`status ${job.status}`">{{ job.status }}</span>
                            </td>


                            <td>
                                <i class="fas fa-pen" @click="displayUpdateJobForm(job.id)"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p v-if="filteredJobs.length == 0">No applications found.</p>

            <div class="pagination mx-auto" v-if="filteredJobs.length > 0">
                <button class="btn btn-secondary" @click="prevPage" :disabled="currentPage === 1">
                    Previous
                </button>

                <span>Page:</span>
                <button
                    v-for="page in totalPages"
                    :key="page"
                    @click="goToPage(page)"
                    :class="['page-button', { active: currentPage === page }]">
                    {{ page }}
                </button>

                <button class="btn btn-secondary" @click="nextPage" :disabled="currentPage >= totalPages">
                    Next
                </button>
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
                showJobsTitle: false,
                showResultsTitle: false,
                showSearchBar: false,
                message: '',
                successMessage: '',
                errorMessage: '',
                searchQuery: "",
                role: '',
                jobs: [],
                currentPage: 1,
                pageSize: 5,
                selectedPage: 1,
                details: [],
                roles: [],
                form: {
                    id: null,
                    company: "",
                    position: "",
                    status: "",
                }
            };
        },
        mounted() {
            this.displayJobs();
        },
        computed: {
            filteredJobs() {
                if (!this.searchQuery) {
                    return this.jobs; // Show all jobs if no search query
                    this.showJobsTitle = true;
                    this.showResultsTitle = false;
                }
                const query = this.searchQuery.toLowerCase();

                this.showJobsTitle = false;
                this.showResultsTitle = true;

                return this.jobs.filter(job =>
                    job.company.toLowerCase().includes(query) ||
                    job.position.toLowerCase().includes(query) ||
                    job.status.toLowerCase().includes(query)
                );
            },
            totalPages() {
                return Math.ceil(this.filteredJobs.length / this.pageSize);
            },
            paginatedJobs() {
                let start = (this.currentPage - 1) * this.pageSize;
                let end = start + this.pageSize;
                return this.filteredJobs.slice(start, end);
            }
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
                        console.error('Axios error :', error);
                        this.message = 'Error while submitting the form.';
                    });
            },
            updateJob() {
                // Example: Simulating API update
                const formData = new FormData();
                formData.append('status', this.form.status);
                formData.append('job_id', this.form.id);

                console.log('Données envoyées :', Object.fromEntries(formData));

                axios.post('index.php?action=updateStatus', formData)
                    .then(response => {
                        console.log('Réponse Axios :', response.data);
                        if (response.data.success) {
                            this.errorMessage = "";
                            this.successMessage = response.data.message;
                            this.displayJobs();

                        } else {
                            this.errorMessage = response.data.message;
                        }
                    })
                    .catch(error => {
                        console.error('Axios error :', error);
                        this.errorMessage = 'Error while submitting the form.';
                    });


            },
            displayNewJobForm() {
                this.showJobs = false;
                this.showNewJobForm = true;
                this.showUpdateJobForm = false;
                this.showSearchBar = false;
            },
            closeNewJobForm() {
                this.showJobs = true;
                this.showNewJobForm = false;
                this.showUpdateJob = false;
            },
            displayJobs() {
                setTimeout(() => {
                    this.successMessage = '';
                }, 2000);

                axios.get('index.php?action=getJobs')
                    .then((response) => {
                        if (Array.isArray(response.data) && response.data.length > 0) {
                            this.jobs = response.data;
                            this.roles = [...new Set(response.data.map(job => job.role))];
                            console.log(roles);

                        } else {
                            console.warn('No data found in API response.');
                        }
                    })
                    .catch((error) => {
                        console.error('Error fetching user data:', error);
                    });
                this.showJobs = true;
                this.showNewJobForm = false;
                this.showUpdateJobForm = false;
                this.showResultsTitle = false;
                this.showSearchBar = false;
                this.showJobsTitle = true;
                this.searchQuery = '';
            },
            displayUpdateJobForm(jobId) {
                this.showJobs = false;
                this.showNewJobForm = false;
                this.showUpdateJobForm = true;
                this.details = this.jobs.filter(job => job.id === jobId);
                this.form = {
                    ...this.details[0]
                };
            },
            displaySearch() {
                this.showSearchBar = true;
                this.showUpdateJobForm = false;
                this.showNewJobForm = false;
            },
            nextPage() {
                if (this.currentPage < this.totalPages) {
                    this.currentPage++;
                }
            },
            prevPage() {
                if (this.currentPage > 1) {
                    this.currentPage--;
                }
            },
            goToPage(page) {
                if (page >= 1 && page <= this.totalPages) {
                    this.currentPage = page;
                }
            }
        }
    }).mount('#app');
</script>

<?php $content = ob_get_clean(); ?>

<?php require './src/view/layout.php'; ?>