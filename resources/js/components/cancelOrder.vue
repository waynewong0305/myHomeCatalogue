<template>
    <div>
        <button class="btn btn-danger" @click="cancelOrder">Cancel</button>
    </div>
</template>

<script>
    export default {
        props: ['orderId'],

        methods: {
            cancelOrder() {
                if(confirm("Are you confirm to cancel the order?")){
                    axios.post('/cancelOrder/' + this.orderId)
                        .then(response => {

                            alert(response.data.message);
                            window.location = '/orderList';
                        })
                        .catch(errors => {
                            alert('Something went wrong! Please try again later.')
                            window.location = '/orderList';
                        });
                }
            }
        }
    }
</script>
