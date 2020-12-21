<template>
    <div class="container">
        <h3>Table of Note</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Published</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="note in notes" :key="note.id">
                    <td><router-link :to="{ name: 'notes.show', params: { noteSlug: note.slug } }">{{ note.title }}</router-link></td>
                    <td>{{ note.subject }}</td>
                    <td>{{ note.published }}</td>
                    <td><router-link :to="{ name: 'notes.edit', params: { noteSlug: note.slug } }">Edit</router-link></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
            notes: [],
        }
    },

    mounted(){
        this.getNotes()
    },

    methods: {
        async getNotes() {
            let response = await axios.get('/api/notes');
            this.notes = response.data.data
        }
    }
}
</script>
