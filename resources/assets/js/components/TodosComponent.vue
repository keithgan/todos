<template>
  <div>
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <h1 class="todos-title">Todos</h1>
            <div class="todos-wrapper">
              <ul class="list-group todos-list">
                <li class="list-group-item todos-list-item" v-for="todo in todos">
                  <a class="todos-list-item-link">{{ todo.title }}</a>
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
        todos: [
          
        ]
      };
    },
    mounted() {
      this.getTodos();
    },

    methods: {
      getTodos: function(){
        axios.get('/todos')
        .then(({ data }) => {
          this.todos = data;
        }, (error) => {
          console.log(error);
        });			
      }
    }
  }
</script>