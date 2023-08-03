<template>
    <div>
        <i class="fa fa-trash-o" style="font-size:25px;color:red" @click="removeFromCart"></i>
    </div>
</template>

<script>
    export default {
        props: ['productId'],

        methods: {
            removeFromCart() {
                if(confirm("Are you confirm to remove the item from shopping cart?")){
                    axios.post('/removeFromCart/' + this.productId)
                        .then(response => {
                            alert('Product removed from the shopping cart!')
                            window.location = '/shopping-cart';
                        })
                        .catch(errors => {
                            alert('Something went wrong! Please try again later.')
                            window.location = '/product/' + this.productId;
                        });
                }
            }
        }
    }
</script>
