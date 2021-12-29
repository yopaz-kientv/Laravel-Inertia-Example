<template>
    <div class="container mt-5">
        <h3>Tasks</h3>
        <div class="card my-4 p-4">
            <h5>Create Task</h5>
            <form @submit.prevent="createTask">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input v-model="form.name" type="text" class="form-control" id="name">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">First</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="task in tasks" :key="task.id">
                        <th v-text="task.id" scope="row"></th>
                        <td v-text="task.name"></td>
                        <td v-text="task.status"></td>
                        <td>
                            <button class="btn">Delete</button>
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
        },
        data() {
            return {
                form: {
                    name: '',
                    status: 0
                }
            }
        },
        methods: {
            createTask() {
                this.$inertia.post('/tasks', this.form);
            }
        },
    };
</script>
