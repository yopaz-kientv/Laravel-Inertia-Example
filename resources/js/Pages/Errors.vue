<template>
    <div>
        <h1 v-text="errors.message"></h1>
        <b v-text="errors.status"></b>
    </div>
</template>

<script>
    export default {
        name: 'Errors',
        props: {
            errors: Array
        }
    };
</script>
