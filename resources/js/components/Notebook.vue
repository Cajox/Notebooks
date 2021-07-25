<template>
    <div class="container-fluid" style="margin-top: 3%; margin-bottom: 3%;">
        <div class="container">
            <div class="row" style="padding-bottom: 10%;">
                <div class="col-md-3" style="margin-top: 3%;" v-for="notebook in notebooks.data" :key="notebook.id">
                    <div class="card h-100">
                        <img class="card-img-top" :src="notebook.product_image" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{notebook.name}}
                            </h5>
                            <div v-for="specification in notebook.specifications">
                                <small>{{specification.name}}: {{specification.value}}</small>
                                <br>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="badge badge-danger float-right">{{notebook.brand}}</div>
                            <div class="float-left">
                                {{formatPrice(notebook.price)}}
                                <br>
                                <small class="text-muted"><b>Poklon: {{notebook.gift}}</b></small>
                            </div>
                        </div>
                    </div>
                </div><!--.col-->
            </div><!--.row-->
            <div class="d-flex">
                <div class="mx-auto">
                    <pagination style="" :data="notebooks" @pagination-change-page="fetchData"></pagination>
                </div>
            </div>
        </div><!--.container-->
    </div><!--.container-fluid-->
</template>

<script>

export default {
    data() {
        return {
            notebooks: {},
        }
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            fetch('/api/get-notebooks?page=' + page, {
                method: 'get'
            }).then(res => res.json())
                .then(data => {
                    this.notebooks = data;
            });

            window.scrollTo({top: 0, behavior: 'smooth'});
        },
        formatPrice(value) {
            let val = (value/1).toFixed(2).replace(',', '.')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }
    }
}
</script>
