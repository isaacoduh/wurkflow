<template>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Clients</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact Person</th>
                    <th scope="col">Contact Email</th>
                    <th class="col">Action</th>
                </tr>
            </thead>
            <tbody v-for="client in clients" :key="client.id">
                <tr>
                    <th scope="row">{{ client.id }}</th>
                    <td>{{ client.name }}</td>
                    <td>{{ client.email }}</td>
                    <td>{{ client.contact_name }}</td>
                    <td>{{ client.contact_email }}</td>
                    <td><button class="btn btn-danger btn-sm"></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Client",
    created() {
        this.loadData();
    },
    methods: {
        loadData() {
            let url = this.url + "/api/clients";
            this.axios.get(url).then(response => {
                this.clients = response.data;
                console.log(this.clients);
            });
        }
    },
    mounted() {},
    data() {
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            clients: []
        };
    }
};
</script>
