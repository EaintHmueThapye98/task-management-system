export default {
    data() {
        return {
            employee: {
                employee_name: "",
                email: "",
                profile: null,
                address: "",
                position: "",
                phone: "",
                dob: "",
            }
        }
    },
    mounted() {
        axios.get('../../api/show-profile/'+this.$route.params.id)
        .then(response => {
            this.employee = response.data;
        })
        .catch(err => {
            console.log(err);
        });
    }
}
