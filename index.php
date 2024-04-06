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
            <form @submit.prevent="submitForm" class="form">
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
        </main>
    </div>

    <script>
    const app = Vue.createApp({
        data() {
            return {
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
        }
    });

    app.mount('#app');
    </script>
</body>

</html>