const { createApp } = Vue

createApp({
    data() {
        return {
            tasks: null,
            newTask: '',
            apiPost: 'storeTasks.php',
            apiGet: 'getTasks.php'
        }
    },
    methods: {
        addTask() {
            //console.log('aggiunta nuova task')
            const data = {
                newTask: this.newTask
            }
            axios.post(
                this.apiPost,
                data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }).then(response => {
                    console.log(response)
                    this.tasks = response.data
                }).catch(error => {
                    console.error(error.message)
                })
            
            newTask = '';
        }
    },
    mounted() {
        axios.get(this.apiGet)
        .then(response => {
            //console.log(response.data);
            this.tasks = response.data;
        })
        .catch(error => {
            console.error(error.message)
        })
    }
}).mount('#app')