<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Codeur Creatif" />
    <title>Job Tracker App - Home</title>

    <!-- CDN Vue.js -->
    <script src="https://unpkg.com/vue@3"></script>

    <!-- CDN Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div id="app">
        <main class="main">
            <h1>Job Tracker App</h1>
            <div class="options">
                <form>
                    <label for="option1">
                        <input type="radio" id="option1" name="options" value="option1" @click="displayNew">
                        New
                    </label>
                    <label for="option2" class="ml-5">
                        <input type="radio" id="option2" name="options" value="option2" @click="displayAll">
                        All
                    </label>
                </form>
            </div> <br>
            <form @submit.prevent="submitForm" 
                        class="form" v-if="showNew">
                <label class="label">
                    Enterprise:
                    <input type="text" v-model="form.enterprise" placeholder="" required>
                </label>

                <label>
                    Job Title:
                    <input type="text" v-model="form.title" placeholder="" required>
                </label>

                <label>
                    Source:
                    <input type="text" v-model="form.source" placeholder="" required>
                </label>

                <label>
                    Recruiter:
                    <input type="text" v-model="form.recruiter" placeholder="" required>
                </label>

                <label>
                    Observations:
                    <input type="text" v-model="form.note" placeholder="">
                </label>

                <button type="submit" class="btn">Submit</button>
            </form>

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
                            <tr v-for="detail in datas" :key="detail.id">
                                <th scope="row">{{ detail.id }}</th>
                                <td>{{ formatDate(detail.date) }}</td>
                                <td>{{ detail.enterprise }}</td>
                                <td>{{ detail.title }}</td>
                                <td>{{ detail.status }}</td>
                            </tr>
                        </tbody>
                    </table>
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
                    form: {
                        enterprise: '',
                        title: '',
                        source: '',
                        recruiter: '',
                        note: ''
                    },
                    datas: []
                };
            },
            methods: {
                displayNew() {
                    this.showNew = true;
                    this.showList = false;
                },
                displayAll() {
                    this.showNew = false;
                    this.showList = true;
                    axios.get('api.php')
                        .then(response => {
                            console.log(response.data);
                            this.datas = response.data;
                        })
                        .catch(error => {
                            console.error(error);
                            alert('not done');
                        });
                },
                submitForm() {
                    axios.post('api.php', this.form)
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
            },
            mounted() {
                this.displayNew();
            }
        });

        app.mount('#app');
    </script>
</body>

</html>
