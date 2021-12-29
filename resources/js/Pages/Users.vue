<template>
    <div>
        <h3>Users</h3>
        <div v-for="user in users" :key="user.id">
            <Link :href="`/users/${user.id}`">
                {{ user.name }}
            </Link>
            <div>{{ user.status }}</div>
        </div>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue';

    export default {
        components: {
            Link
        },
        props: {
            users: Array
        }
    };
</script>
