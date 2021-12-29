<template>
    <div class="container mt-5">
        <h3>Tasks</h3>
        <div class="card my-4 p-4">
            <h5>Create Task</h5>
            <form @submit.prevent="createTask">
                <div class="mb-3">

                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input v-model="form.name" type="text" class="form-control" id="name">
                        <div v-if="errors.name" v-text="errors.name" class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea v-model="form.description" class="form-control" id="description"></textarea>
                        <div v-if="errors.description" v-text="errors.description" class="text-danger"></div>
                    </div>

                    <div class="form-group">
                        <select v-model="form.status" class="form-control">
                            <option value="0">Backlog</option>
                            <option value="1">Todo</option>
                            <option value="2">In Progress</option>
                            <option value="3">Ready to review</option>
                            <option value="4">In review</option>
                            <option value="5">Resolved</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="task in tasks" :key="task.id">
                        <th v-text="task.id" scope="row"></th>
                        <td v-text="task.name"></td>
                        <td v-text="task.description"></td>
                        <td>
                            <select @change="updateTask(task)" v-model="task.status">
                                <option value="0">Backlog</option>
                                <option value="1">Todo</option>
                                <option value="2">In Progress</option>
                                <option value="3">Ready to review</option>
                                <option value="4">In review</option>
                                <option value="5">Resolved</option>
                            </select>
                        </td>
                        <td>
                            <button @click="deleteTask(task)" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

    export default {
        name: 'Tasks',
        props: {
            tasks: Array,
            errors: Object
        },
        data() {
            return {
                form: {
                    name: '',
                    description: '',
                    status: 0
                }
            };
        },
        methods: {
            createTask() {
                this.$inertia.post(this.route('tasks.index'), this.form);
                this.form = {
                    name: '',
                    description: '',
                    status: 0
                };
            },

            updateTask(task) {
                this.$inertia.put(this.route('tasks.index', task.id), task);
            },

            deleteTask(task) {
                this.$inertia.delete(this.route('tasks.destroy', task.id));
            }
        }
    };
</script>
