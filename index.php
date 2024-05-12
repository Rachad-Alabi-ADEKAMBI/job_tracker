<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'parts/meta.php'; ?>    
</head>

<body>
    <div id="app">
        <main class="main">
            <h1>Job Tracker</h1>
            <div class="options">
                <form>
                    <label for="searchRadio">
                        <input type="radio" id="searchRadio" name="options" @click="displaySearch()">
                        Search
                    </label>
                    <label for="newRadio" class="ml-5">
                        <input type="radio" id="newRadio" name="options" @click="displayNew()">
                        New
                    </label>
                    <label for="allRadio" class="ml-5">
                        <input type="radio" id="allRadio" name="options" @click="displayAll()">
                        All
                    </label>
                </form>
            </div>
            <br>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 md-4 mx-auto">
                        <div class="search" v-if="showSearch">
                            <div class="input-group rounded mx-auto">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" v-model="searchQuery" @input="search">
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="http://127.0.0.1/job_tracker/api/newJob" v-if="showNew">
                <label class="label">
                    Enterprise:
                    <input type="text" name="enterprise" placeholder="" required>
                </label>

                <label>
                    Job Title:
                    <input type="text" name='title' placeholder="" required>
                </label>

                <label>
                    Source:
                    <input type="text" name='source' placeholder="" required>
                </label>

                <label>
                    Recruiter:
                    <input type="text" name='recruiter' placeholder="" required>
                </label>

                <label>
                    Note:
                    <input type="text" name='note' placeholder="">
                </label>

                <button type="submit" class="btn">Submit</button>
            </form>

            <div class="container" v-if="showFiltered">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <!-- Table headers and body -->
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Enterprise</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="detail in paginatedData" :key="detail.id">
                                        <th scope="row">{{ detail.id }}</th>
                                        <td>{{ formatDate(detail.date) }}</td>
                                        <td>{{ detail.enterprise }}</td>
                                        <td>{{ detail.title }}</td>
                                        <td>{{ detail.status }}</td>
                                        <td v-if="detail.status === 'pending'">
                                            <button class="btn btn-success" @click="makeAccepted(detail.id)">
                                                Yes
                                            </button>
                                            <button class="btn btn-danger" @click="makeRejected(detail.id)">
                                                No
                                            </button>
                                        </td>
                                        <td v-else>
                                            Item Processed
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Pagination controls -->
                            <nav aria-label="Page navigation mx-auto">
                                <ul class="pagination">
                                    <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                                        <a class="page-link" href="#" @click.prevent="prevPage">Previous</a>
                                    </li>
                                    <li class="page-item" v-for="page in totalPages" :key="page" :class="{ 'active': page === currentPage }">
                                        <a class="page-link" href="#" @click.prevent="gotoPage(page)">{{ page }}</a>
                                    </li>
                                    <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                                        <a class="page-link" href="#" @click.prevent="nextPage">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list" v-if="showList">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Enterprise</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="detail in paginatedData" :key="detail.id">
                                <th scope="row">{{ detail.id }}</th>
                                <td>{{ formatDate(detail.date) }}</td>
                                <td>{{ detail.enterprise }}</td>
                                <td>{{ detail.title }}</td>
                                <td>{{ detail.status }}</td>
                                <td v-if='detail.status = "pending"'>
                                   <button class="btn btn-success" @click='makeAccepted(detail.id)'>
                                        Yes
                                   </button>

                                   <button class="btn btn-danger" @click='makeRejected(detail.id)'>
                                        No
                                   </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Pagination controls -->
                    <nav aria-label="Page navigation mx-auto">
                        <ul class="pagination">
                            <li class="page-item" :class="{ 'disabled': currentPage === 1 }">
                            <a class="page-link" href="#" @click.prevent="prevPage">Previous</a>
                            </li>
                            <li class="page-item" v-for="page in totalPages" :key="page" :class="{ 'active': page === currentPage }">
                            <a class="page-link" href="#" @click.prevent="gotoPage(page)">{{ page }}</a>
                            </li>
                            <li class="page-item" :class="{ 'disabled': currentPage === totalPages }">
                            <a class="page-link" href="#" @click.prevent="nextPage">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>

    <script>
        const app = Vue.createApp({
            data() {
                return {
                    showList: false,
                    showNew: false,
                    showSearch: false,
                    showFiltered: false,
                    searchQuery: '',
                    length: 0,
                    form: {
                        enterprise: '',
                        title: '',
                        source: '',
                        recruiter: '',
                        note: ''
                    },
                    datas: [],
                    currentPage: 1,
                    pageSize: 10, // Number of items per page
                };
            },
            computed: {
                paginatedData() {
                    const startIndex = (this.currentPage - 1) * this.pageSize;
                    const endIndex = startIndex + this.pageSize;
                    return this.datas.slice(startIndex, endIndex);
                },
                totalPages() {
                    return Math.ceil(this.datas.length / this.pageSize);
                },
            },
            methods: {
                displayNew() {
                    this.showNew = true;
                    this.showList = false;
                    this.showSearch = false;
                    this.showFiltered = false;
                },
                displayAll() {
                    this.showNew = false;
                    this.showList = true;
                    this.showSearch = false;
                    this.showFiltered = false;
                    axios.get('http://127.0.0.1/job_tracker/api/jobs')
                        .then(response => {
                            console.log(response.data);
                            this.datas = response.data;
                        })
                        .catch(error => {
                            console.error(error);
                            alert('not donee');
                        });
                },
                displaySearch() {
                    this.showNew = false;
                    this.showList = false;
                    this.showSearch = true;
                    this.showFiltered = true;
                },
                submitForm() {
                    axios.post('api/newJob', this.form)
                        .then(response => {
                            console.log(response.data);
                            alert('done');
                        })
                        .catch(error => {
                            console.error(error);
                            alert('error, not done');
                        });
                },
                formatDate(date) {
                    if (date) {
                        const [datePart, timePart] = date.split(' ');
                        const [year, month, day] = datePart.split('-');
                        return `${day}-${month.slice(-2)}-${year.slice(-2)}`;
                    }
                    return '';
                },
                prevPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },
                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                },
                gotoPage(page) {
                    this.currentPage = page;
                },
                search() {
                    this.datas = this.datas.filter(item => item.title.toLowerCase().includes(this.searchQuery.toLowerCase()));

                },
                makeAccepted(id) {
                    axios.put('api.php', { id, status: 'accepted' })
                        .then(response => {
                            console.log(response.data);
                            alert('Item status updated');
                            this.displayAll(); // Refresh data after update
                        })
                        .catch(error => {
                            console.error(error);
                            alert('Error updating item status');
                        });
                },
                makeRejected(id) {
                    axios.put('api.php', { id, status: 'rejected' })
                        .then(response => {
                            console.log(response.data);
                            alert('Item status updated');
                            this.displayAll(); // Refresh data after update
                        })
                        .catch(error => {
                            console.error(error);
                            alert('Error updating item status');
                        });
                     },
            },
            mounted() {
                this.displayAll();
            }
        });

        app.mount('#app');
    </script>
</body>

</html>
