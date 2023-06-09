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
            apiPost: 'app/Http/Controllers/TaskController/store.php',
            apiGet: 'app/Http/Controllers/TaskController/index.php',
            apiDelete: 'app/Http/Controllers/TaskController/delete.php',
            apiToggleDone: 'app/Http/Controllers/TaskController/toggle.php'
        }
    },
    methods: {
        addTask() {
            const data = {
                newTask: this.newTask
            }

            axios.post(
                this.apiPost,
                data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }).then(response => {
                    this.tasks = response.data
                }).catch(error => {
                    console.error(error.message)
                })
        },
        toggleDone(index) {
            const data = {
                index
            }
            axios.post(
                this.apiToggleDone,
                data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }).then(response => {
                    this.tasks = response.data
                }).catch(error => {
                    console.error(error.message)
                })
        },
        deleteTask(index) {

            event.stopPropagation();
            const data = {
                index
            }
            axios.post(
                this.apiDelete,
                data,
                {
                    headers: { 'Content-Type': 'multipart/form-data' }
                }).then(response => {
                    this.tasks = response.data
                }).catch(error => {
                    console.error(error.message)
                })
        }
    },
    mounted() {
        axios.get(this.apiGet)
        .then(response => {
            this.tasks = response.data;
        })
        .catch(error => {
            console.error(error.message)
        })
    }
}).mount('#app')