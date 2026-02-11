// Load tasks from local storage
var tasks = JSON.parse(localStorage.getItem("tasks"));
if (tasks == null) {
  tasks = [];
}

var input = document.getElementById("taskInput");

// Enter key to add
input.onkeydown = function (event) {
  if (event.key == "Enter") {
    addTask();
  }
};

function render() {
  var list = document.getElementById("taskList");
  list.innerHTML = "";

  for (var i = 0; i < tasks.length; i++) {
    var li = document.createElement("li");

    li.innerHTML =
      "<span onclick='startEdit(" + i + ")'>" + tasks[i] + "</span>" +
      "<div class='actions'>" +
      "<i class='fa-solid fa-pen' onclick='startEdit(" + i + ")'></i>" +
      "<i class='fa-solid fa-trash' onclick='deleteTask(" + i + ")'></i>" +
      "</div>";

    list.appendChild(li);
  }

  localStorage.setItem("tasks", JSON.stringify(tasks));
}

function addTask() {
  if (input.value.trim() == "") {
    return;
  }

  tasks.push(input.value);
  input.value = "";
  render();
}

function deleteTask(index) {
  tasks.splice(index, 1);
  render();
}

function startEdit(index) {
  var list = document.getElementById("taskList");
  var li = list.children[index];

  li.innerHTML =
    "<input class='edit-input' type='text' value='" + tasks[index] + "' " +
    "onblur='saveEdit(" + index + ", this.value)' " +
    "onkeydown=\"if(event.key=='Enter') saveEdit(" + index + ", this.value)\" autofocus>";
}

function saveEdit(index, value) {
  if (value.trim() != "") {
    tasks[index] = value;
  }
  render();
}

render();
