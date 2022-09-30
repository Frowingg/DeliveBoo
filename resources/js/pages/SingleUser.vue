<template>
    <div>
    </div>
</template>

<script>

export default {
    name: "SingleUser",
    data() {
        return {
            user: null
        }
    },
    mounted() {
        axios.get('/api/users/' + this.$route.params.slug)
        .then((response) => {

            if(response.data.success) {
                this.user = response.data.results;

            } else {
                this.$router.push({name: 'not-found'});
            }
        });
    }
};
</script>

<style></style>
