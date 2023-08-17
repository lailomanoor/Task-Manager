CREATE TABLE tasks (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255),
  description TEXT,
  priority VARCHAR(50),
  created_at DATETIME
);

-- Create the statuses table
CREATE TABLE statuses (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(50)
);

-- Create the many-to-many relationship table between tasks and statuses
CREATE TABLE task_statuses (
  task_id INT,
  status_id INT,
  PRIMARY KEY (task_id, status_id),
  FOREIGN KEY (task_id) REFERENCES tasks(id),
  FOREIGN KEY (status_id) REFERENCES statuses(id)
);

insert into statuses(name) values ("in-progress");
insert into statuses(name) values ("new");
insert into statuses(name) values ("completed");
