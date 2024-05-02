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

</head>

<body>
    <div id="app">
        <main class="main">
            <h1>Job Tracker App</h1>
            <div class="options">
            <form>
                <label for="option1">
                <input type="radio" id="option1" name="options" value="option1" 
                    @click='displayNew()'>
                New 
                </label>
                <label for="option2 ml-5">
                <input type="radio" id="option2" name="options" value="option2"
                     @click='displayAll()'>
                All
                </label>
            </form>
            </div>
            <form @submit.prevent="submitForm" class="form" v-if='showNew'>
                <label>
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

            <div class="list" v-if='showList'>
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Enterprise</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
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
                }
            };
        },
        methods: {
            displayNew(){
                this.showNew = true,
                this.showList = false
            },
            displayAll(){
                this.showNew = false,
                this.showList = true
            },
            submitForm() {
                axios.post('api.php', this.form)
                    .then(response => {
                        console.log(response.data);
                        alert('done');
                    })
                    .catch(error => {
                        console.error(error);
                        alert('not done')
                    });
            }
        },
        mounted() {
            this.displayNew();
        }
    });

    app.mount('#app');
    </script>
</body>

</html>