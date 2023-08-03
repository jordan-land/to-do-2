let todos = [];

function renderTodoList() {
  const pendingList = document.getElementById('pendingList');
  const completedList = document.getElementById('completedList');
  pendingList.innerHTML = '';
  completedList.innerHTML = '';


  
  todos.forEach((todo) => {
    const listItem = document.createElement('li');
    listItem.className = 'todo-item' + (todo.completed ? ' completed' : '');

    const labelInput = document.createElement('input');
    labelInput.type = 'text';
    labelInput.value = todo.label;
    labelInput.disabled = todo.completed;
    labelInput.addEventListener('change', (event) => {
      todo.label = event.target.value;
    });

    const dateLabel = document.createElement('input');
    dateLabel.type = 'text';
    dateLabel.value = new Date(todo.date).toLocaleDateString();
    dateLabel.disabled = true;

    const actionsDiv = document.createElement('div');
    actionsDiv.className = 'actions';

    const completeButton = document.createElement('button');
    completeButton.innerHTML = '<div class="complete"><i class="far fa-check-circle"></i></div>';    
    // completeButton.disabled = todo.completed:
    completeButton.addEventListener('click', () => {
      todo.completed = !todo.completed;
      renderTodoList();
    });

    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = '<div class="delete"><i class="far fa-trash-alt"></i></div>';
    deleteButton.disabled = todo.completed;
    deleteButton.addEventListener('click', () => {
      if (confirm('Are you sure you want to delete this item?')) {
        todos = todos.filter((existantItem) => existantItem !== todo);
        renderTodoList();
      }
    });

    actionsDiv.appendChild(completeButton);
    actionsDiv.appendChild(deleteButton);

    listItem.appendChild(labelInput);
	// Check if the todo has a date value	
  if (todo.date) {	
    const dateLabel = document.createElement('input');	
    dateLabel.type = 'text';	
    dateLabel.value = new Date(todo.date).toLocaleDateString();	
    dateLabel.disabled = true;	
    listItem.appendChild(dateLabel);	
  }    listItem.appendChild(actionsDiv);    listItem.appendChild(actionsDiv);

    if (todo.completed) {
      completedList.appendChild(listItem);
    } else {
      pendingList.appendChild(listItem);
    }
  });
}

document.getElementById('createTodoForm')
  .addEventListener('submit', (event) => {
    event.preventDefault();

    const labelInput = document.getElementById('labelInput');
    const label = labelInput.value.trim();

    const date = document.getElementById('dueDateInput').value.trim();

    // below we are saying that, if there is no due date set, it should display nothing
    if (label) {
      const todo = {
        completed: false,
        date,
        label,
      };

      todos.push(todo);
      labelInput.value = '';
      renderTodoList();

      console.log(todos);
    }
  });

renderTodoList();
