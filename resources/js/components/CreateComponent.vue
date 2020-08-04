<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">タイトル</label>
                        <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">内容(140字まで)</label>
                        <!-- <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content"> -->
                        <textarea rows="10" class="col-sm-9 form-control" id="content" v-model="task.content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">登録する</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data: function () {
           return {
               task: {}
           }
       },
       methods: {
           submit() {
               axios.post('/api/tasks', this.task)
                   .then((res) => {
                       this.$router.push({name: 'task.list'});
                   });
           }
       }
   }
</script>