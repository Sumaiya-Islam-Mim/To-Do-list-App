document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("taskForm");
  const taskInput = document.getElementById("taskInput");
  const taskList = document.getElementById("taskList");

  // Load existing tasks
  fetch("get_tasks.php")
    .then(response => response.json())
    .then(data => {
      data.forEach(task => {
        addTaskToUI(task.task);
      });
    });

  // Add task
  form.onsubmit = function (e) {
    e.preventDefault();
    const task = taskInput.value.trim();

    if (task !== "") {
      fetch("add_task.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "task=" + encodeURIComponent(task)
      })
        .then(response => response.text())
        .then(() => {
          addTaskToUI(task);
          taskInput.value = "";
        });
    }
    return false;
  };

  function addTaskToUI(task) {
    const li = document.createElement("li");
    li.className = "list-group-item";
    li.textContent = task;
    taskList.appendChild(li);
  }
});
