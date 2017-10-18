
<script>

export  default {
        data: function() {
            return {
                edit: false,
                list: [],
                task: {
                    id: '123',
                    body: 'dgd'
                }
            };
        },
        
        ready: function() {
            this.fetchTaskList();
        },
        
        methods: {
            fetchTaskList: function() {
                this.$http.get('api/tasks').then(function (response) {
                    this.list = response.data
                });
            },
 
            trytry: function () {
                this.$http.post('/store', this.task).then(function(response) {

                	console.log(response.data);
                })

            },
 
            updateTask: function(id) {
                this.$http.patch('api/task/' + id, this.task)
                this.task.body = ''
                this.edit = false
                this.fetchTaskList()
            },
 
            showTask: function(id) {
                this.$http.get('api/task/' + id).then(function(response) {
                    this.task.id = response.data.id
                    this.task.body = response.data.body
                })
                this.$els.taskinput.focus()
                this.edit = true
            },
 
            deleteTask: function (id) {
                this.$http.delete('api/task/' + id)
                this.fetchTaskList()
            },
        }
    }
    

</script>

<template  src="./templates/game.html">

</template>

<style>
	.game{}

</style>