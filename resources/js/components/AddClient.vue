<template>
    <div>
        <div class="container">
            <h2 class="text-center p-2 text-white bg-primary mt-5">
                Add a new Client
            </h2>
            <div class="card-body">
                <div class="col-md-6 col-md-3">
                    <form
                        id="validateForm"
                        @submit.prevent="addClient"
                        enctype="multipart/form-data"
                        novalidate
                    >
                        <div class="alert alert.danger" v-if="errors.length">
                            <ul class="mb-0">
                                <li
                                    v-for="(error, index) in errors"
                                    :key="index"
                                >
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                id="name"
                                v-model="client.name"
                                class="form-control"
                                placeholder="Client Name"
                            />
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input
                                type="text"
                                id="email"
                                v-model="client.email"
                                class="form-control"
                                placeholder="Client Email address"
                            />
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input
                                type="text"
                                id="phone"
                                v-model="client.phone"
                                class="form-control"
                                placeholder="Client Phone Number"
                            />
                        </div>

                        <div class="form-group">
                            <label for="office_address">Office Address</label>
                            <textarea
                                name="office_address"
                                v-model="client.office_address"
                                id="office_address"
                                cols="30"
                                rows="10"
                            ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="contact_name">Client Contact</label>
                            <input
                                type="text"
                                id="contact_name"
                                v-model="client.contact_name"
                                name="contact_name"
                                class="form-control"
                                placeholder="Client Contact"
                            />
                        </div>

                        <div class="form-group">
                            <label for="contact_office">Contact Office</label>
                            <textarea
                                name="contact_office"
                                v-model="client.contact_office"
                                id="office_address"
                                cols="30"
                                rows="10"
                            ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="contact_email">Contact Email</label>
                            <input
                                type="text"
                                id="contact_email"
                                v-model="client.contact_email"
                                name="contact_email"
                                class="form-control"
                                placeholder="Client Email"
                            />
                        </div>
                        <div class="form-group">
                            <label for="type">Client Type</label>
                            <select name="type" v-model="client.type" id="type">
                                <option value="individual">Individual</option>
                                <option value="organization"
                                    >Organization</option
                                >
                            </select>
                        </div>

                        <div class="form-group">
                            <input
                                type="file"
                                name="image"
                                class="form-control"
                                id=""
                                v-on:change="addImage"
                            />
                            <label for="">Add a Photo....</label>
                        </div>

                        <button class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            client: {},
            name: "",
            email: "",
            phone: "",
            office_address: "",
            contact_name: "",
            contact_email: "",
            contact_office: "",
            type: "",
            errors: []
        };
    },
    methods: {
        addClient() {
            this.errors = [];
            if (!this.client.name) {
                this.errors.push("Name is required!");
            }
            if (!this.client.email) {
                this.errors.push("Email is required!");
            }
            if (!this.client.phone) {
                this.errors.push("Phone is required!");
            }
            if (!this.client.office_address) {
                this.errors.push("Office address is required!");
            }
            if (!this.client.contact_name) {
                this.errors.push("Client Contact Name is required!");
            }
            if (!this.client.contact_email) {
                this.errors.push("Client Contact Phone is required!");
            }
            if (!this.client.type) {
                this.errors.push("Select a client type!");
            }

            if (!this.errors.length) {
                let data = new FormData();
                data.append("name", this.client.name);
                data.append("email", this.client.email);
                data.append("image", this.image);
                data.append("phone", this.client.phone);
                data.append("office_address", this.client.office_address);
                data.append("contact_name", this.client.contact_name);
                data.append("contact_email", this.client.contact_email);
                data.append("contact_office", this.client.contact_office);
                data.append("type", this.client.type);
                let url = this.url + "/api/clients";
                this.axios
                    .post(url, data)
                    .then(response => console.log(response));
            }
        },
        addImage(e) {
            this.image = e.target.files[0];
            console.log(this.image);
        }
    },
    mounted: function() {
        console.log("..");
    }
};
</script>
