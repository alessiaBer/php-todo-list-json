/*
Descrizione
Dobbiamo creare una web-app che permetta di leggere e scrivere una lista di Todo.
Deve essere anche gestita la persistenza dei dati leggendoli da, e scrivendoli in un file JSON.

Bonus
-Mostrare lo stato del task → se completato, barrare il testo
-Permettere di segnare un task come completato facendo click sul testo
-Permettere il toggle del task (completato/non completato)
-Abilitare l’eliminazione di un task
*/


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
                newTask: this.newTask,
                done: false
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
                //TODO add empty v-model when newtask is generated
        },
        toggleCompleted(task) {
            if (task.done === true) {
                task.done = false
            } else {
                task.done = true
            }
        },
        deleteTask(task) {

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