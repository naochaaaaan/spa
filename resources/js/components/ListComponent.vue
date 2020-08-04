<template>
    <div class="container">
        <!-- <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">タイトル</th>
                    <th scope="col">内容</th>
                    <th scope="col">詳細</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" :key="task.id">
                    <th scope="row">{{ task.id }}</th>
                    <td>{{ task.title }}</td>
                    <td>{{ task.content }}</td>
                    <td>
                        <router-link v-bind:to="{name: 'task.show', params: {taskId: task.id }}">
                            <button class="btn btn-outline-dark">詳細</button>
                        </router-link>
                    </td>
                    <td>
                        <router-link v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                            <button class="btn btn-outline-dark">編集</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-outline-dark" v-on:click="deleteTask(task.id)">削除</button>
                    </td>
                </tr>
            </tbody>
        </table> -->
        
            <div v-for="task in tasks" :key="task.id" class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" :id="'heading' + task.id">
                        <h5 class="mb-0">
                            <button v-if="task.id == 1" class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#collapse' + task.id" 
                            aria-expanded="true" :aria-controls="'collapse' + task.id">
                            {{ task.title }}
                            </button>
                            <button v-else class="btn btn-link collapsed" type="button" data-toggle="collapse" :data-target="'#collapse' + task.id"
                            aria-expanded="false" :aria-controls="'collapse' + task.id">
                            {{ task.title }}
                            </button>
                        </h5>
                    </div>
                    <div v-if="task.id == 1" :id="'collapse' + task.id" class="collapse show" :aria-labelledby="'heading' + task.id" data-parent="#accordionExample">
                        <div class="card-body">
                        {{ task.content }}
                            <div>
                                <router-link d-inline v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                                    <button class="btn btn-outline-dark">編集</button>
                                </router-link>
                                <button d-inline class="btn btn-outline-dark" v-on:click="deleteTask(task.id)">削除</button>
                            </div>
                        </div>
                    </div>
                    <div v-else :id="'collapse' + task.id" class="collapse" :aria-labelledby="'heading' + task.id" data-parent="#accordionExample">
                        <div class="card-body">
                        {{ task.content }}
                            <div>
                                <router-link d-inline v-bind:to="{name: 'task.edit', params: {taskId: task.id }}">
                                    <button class="btn btn-outline-dark">編集</button>
                                </router-link>
                                <button d-inline class="btn btn-outline-dark" v-on:click="deleteTask(task.id)">削除</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
    data: function () {
        return {
            tasks: []
        }
    },
    methods: {
        getTasks() {
            axios.get('/api/tasks')
                .then((res) => {
                    this.tasks = res.data;
                });
        },
        deleteTask(id) {
            axios.delete('/api/tasks/' + id)
                .then((res) => {
                    this.getTasks();
                });
        }
    },
    mounted() {
        this.getTasks();
    }
}
</script>