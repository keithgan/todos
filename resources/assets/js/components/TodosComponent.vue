<template>
  <div>
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <h1 class="todos-title">Todos</h1>
              <form @submit.prevent='addTodo' class='mb-3'>
                <div class="form-group">
                  <input type="text" class="form-control" style='text-align:center' placeholder="What needs to be done?" v-model='todo.title'>
                </div>
                <button type='submit' class="btn btn-primary btn-block">Save</button>
              </form>
            <div class="todos-wrapper">
              <ul class="list-group todos-list">
                <li class="list-group-item todos-list-item" v-for='todo in todos' v-bind:key='todo.id'>
                  <a @click='editTodo(todo)' class="todos-list-item-link">{{ todo.title }}</a>
                  <button @click='deleteTodo(todo.id)'  class= 'btn btn-danger' style='float: right'>Delete</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br/>
  </div>
  </template>

<script>
  export default {
    data: function(){
      return {
        todos: [],
        todo: {
          title: ''
        },
        edit: false
      }
    },

    mounted() {
      this.getTodos();
    },

    methods: {
      getTodos: function(){
      //   axios({
      //     method: 'get',
      //     url:'api/todos',
      //     headers: {
      //       'content-type': 'application/json'
      //     }
      //   })
      //   .then(({ data }) => {
      //     this.todos = data;
      //   }, (error) => {
      //     console.log(error);
      //   });			
      // },
        axios.get('api/todos').then((res) => {
        this.todos = res.data;
        }, (error) => {
          console.log(error);
        });
      },
      addTodo: function() {
        if(this.edit == false) {
          // add
          axios({
            method: 'post',
            url: 'api/todos',
            data: {
              title: this.todo.title,
            },
            headers: {
              'content-type': 'application/json'
            }
          })
          .then(data => {
            this.todo.title = '';
            this.getTodos();
          }, (error) => {
          console.log(error);
          });
        } else {
          // Update
          axios({
            method: 'put',
            url: `api/todos/${this.todo.id}`,
            data: {
              title: this.todo.title,
            },
            headers: {
              'content-type': 'application/json'
            }
          })
          .then(data => {
            this.todo.title = '';
            this.getTodos();
            this.edit = false;
          }, (error) => {
          console.log(error);
          });
        }
      },
      deleteTodo(id) {
        axios({
          method: 'delete',
          url: `api/todos/${id}`
        })
        .then(data => {
          this.getTodos();
        }, (error) => {
          console.log(error);
        });
      },
      editTodo(todo) {
        this.edit = true;
        this.todo.id = todo.id;
        this.todo.title = todo.title;
      }
    }
  }
</script>