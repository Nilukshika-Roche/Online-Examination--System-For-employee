-- Create the database if it does not exist
CREATE DATABASE IF NOT EXISTS online_examination;

USE online_examination;

-- Creating Department table
CREATE TABLE IF NOT EXISTS Department (
    Department_ID INT AUTO_INCREMENT PRIMARY KEY,
    Department_Name VARCHAR(255)
);

-- Creating Employee table
CREATE TABLE IF NOT EXISTS Employee (
    Employee_ID INT AUTO_INCREMENT PRIMARY KEY,
    First_Name VARCHAR(255),
    Last_Name VARCHAR(255),
    DOB DATE,
    Position VARCHAR(255),
    Department_ID INT,
    FOREIGN KEY (Department_ID) REFERENCES Department(Department_ID)
);

-- Creating exams table
CREATE TABLE IF NOT EXISTS Exams (
    Exam_ID INT AUTO_INCREMENT PRIMARY KEY,
    exam VARCHAR(255),
    exam_description VARCHAR(255),
    add_on DATE,
    CreatedBy VARCHAR(255),
    code VARCHAR(255),
    password VARCHAR(255)
);


-- Creating NewCandidate table
CREATE TABLE IF NOT EXISTS NewCandidate (
    Candidate_ID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    add_on DATE,
    source VARCHAR(255),
    CreatedBy VARCHAR(255),
    Exam_ID INT,
    FOREIGN KEY (Exam_ID) REFERENCES Exams(Exam_ID)
);

-- Creating User table
CREATE TABLE IF NOT EXISTS User (
    User_ID INT AUTO_INCREMENT PRIMARY KEY,
    First_Name VARCHAR(255),
    Last_Name VARCHAR(255),
    Candidate_ID INT,
    Employee_ID INT,
    Department_ID INT,
    Email VARCHAR(255),
    Password VARCHAR(255),
    FOREIGN KEY (Employee_ID) REFERENCES Employee(Employee_ID),
    FOREIGN KEY (Candidate_ID) REFERENCES NewCandidate(Candidate_ID),
    FOREIGN KEY (Department_ID) REFERENCES Department(Department_ID)
);


-- Creating Email table
CREATE TABLE IF NOT EXISTS Email (
    Email_ID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    User_ID INT,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
);


-- Creating Ticket table
CREATE TABLE IF NOT EXISTS Ticket (
    Ticket_ID INT AUTO_INCREMENT PRIMARY KEY,
    Description TEXT,
    Type VARCHAR(100),
    Date DATE,
    User_ID INT,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
);


-- Creating Contact table
CREATE TABLE IF NOT EXISTS Contact (
    Contact_ID INT AUTO_INCREMENT PRIMARY KEY,
    Contact_No VARCHAR(15),
    User_ID INT,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
);

CREATE TABLE IF NOT EXISTS NewCandidate (
    Candidate_ID INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    add_on DATE,
    source VARCHAR(255),
    CreatedBy_ID INT,
    FOREIGN KEY (CreatedBy_ID) REFERENCES User(User_ID)
);

-- Creating Result table
CREATE TABLE IF NOT EXISTS Result (
    Result_ID INT AUTO_INCREMENT PRIMARY KEY,
    First_Name VARCHAR(255),
    Last_Name VARCHAR(255),
    Exam_Result VARCHAR(255),
    Pass_Mark INT,
    Pass_Fail VARCHAR(50),
    User_ID INT,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
);


-- Creating Promotion table
CREATE TABLE IF NOT EXISTS Promotion (
    Promotion_ID INT AUTO_INCREMENT PRIMARY KEY,
    Recommended_on DATE,
    Recommended_by INT,
    Approved_on DATE,
    Approved_by VARCHAR(255),
    User_ID INT,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
);

-- Creating Training table
CREATE TABLE IF NOT EXISTS Training (
    Training_ID INT AUTO_INCREMENT PRIMARY KEY,
    Venue VARCHAR(255),
    Date DATE,
    Status VARCHAR(100),
    Department_ID INT,
    User_ID INT,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID),
    FOREIGN KEY (Department_ID) REFERENCES Department(Department_ID)
);

-- Creating Risk table
CREATE TABLE IF NOT EXISTS Risk (
    Risk_ID INT AUTO_INCREMENT PRIMARY KEY,
    Risk_Description VARCHAR(255),
    Risk_Level VARCHAR(100),
    Department_ID INT,
    FOREIGN KEY (Department_ID) REFERENCES Department(Department_ID)
);


CREATE TABLE IF NOT EXISTS Questions (
    Question_ID INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255),
    answer VARCHAR(255),
    add_on DATE,
    CreatedBy VARCHAR(255),
    Exam_ID INT,
    FOREIGN KEY (Exam_ID) REFERENCES Exams(Exam_ID)
);

CREATE TABLE IF NOT EXISTS Answers (
    Answer_ID INT AUTO_INCREMENT PRIMARY KEY,
    answer VARCHAR(255),
    Question_ID INT,
    Exam_ID INT,
    User_ID INT,
  	FOREIGN KEY (Exam_ID) REFERENCES Exams(Exam_ID),
    FOREIGN KEY (Question_ID) REFERENCES Questions(Question_ID),
    FOREIGN KEY (User_ID) REFERENCES User(User_ID)
);

INSERT INTO Department (Department_Name) VALUES ('Human Resources');
INSERT INTO Department (Department_Name) VALUES ('IT');
INSERT INTO Department (Department_Name) VALUES ('Finance');

INSERT INTO Employee (First_Name, Last_Name, DOB, Position, Department_ID) VALUES ('John', 'Doe', '1980-01-01', 'Manager', 1);
INSERT INTO Employee (First_Name, Last_Name, DOB, Position, Department_ID) VALUES ('Jane', 'Smith', '1985-05-15', 'Developer', 2);
INSERT INTO Employee (First_Name, Last_Name, DOB, Position, Department_ID) VALUES ('Mike', 'Brown', '1990-08-20', 'it-support', 3);

INSERT INTO Exams (exam, exam_description, add_on, CreatedBy) VALUES
('Math Final', 'Final exam for the Math course', '2024-05-01', '1'),
('Physics Midterm', 'Midterm exam for Physics', '2024-04-15', '2'),
('Chemistry Quiz', 'Weekly quiz for Chemistry', '2024-04-20', '3');

INSERT INTO NewCandidate (email, add_on, source, CreatedBy, Exam_ID) VALUES ('candidate1@example.com', '2024-01-01', 'Website', '1', 1);
INSERT INTO NewCandidate (email, add_on, source, CreatedBy, Exam_ID) VALUES ('candidate2@example.com', '2024-02-01', 'Referral', '2', 1);
INSERT INTO NewCandidate (email, add_on, source, CreatedBy, Exam_ID) VALUES ('candidate3@example.com', '2024-03-01', 'Job Fair', '3', 1);


INSERT INTO User (First_Name, Last_Name, Candidate_ID, Employee_ID, Department_ID, Email, Password) VALUES ('Alice', 'Johnson', 1, null, 1, 'alice.johnson@example.com', 'password1');
INSERT INTO User (First_Name, Last_Name, Candidate_ID, Employee_ID, Department_ID, Email, Password) VALUES ('Bob', 'Wilson', 2, null, 2, 'bob.wilson@example.com', 'password2');
INSERT INTO User (First_Name, Last_Name, Candidate_ID, Employee_ID, Department_ID, Email, Password) VALUES ('Carol', 'Taylor', null, 3, 3, 'itsupport@gmail.com', '$2y$10$QwqMgwRvC1OXlXvUBD06KOkDtKh1F23H0asqeil6dxj.d74JHlf4C');

INSERT INTO Email (email, User_ID) VALUES ('alice.johnson@example.com', 1);
INSERT INTO Email (email, User_ID) VALUES ('bob.wilson@example.com', 2);
INSERT INTO Email (email, User_ID) VALUES ('itsupportr@gmail.com', 3);

INSERT INTO Ticket (Description, Type, Date, User_ID) VALUES ('Issue with login', 'Technical', '2024-04-01', 1);
INSERT INTO Ticket (Description, Type, Date, User_ID) VALUES ('Request for software update', 'Maintenance', '2024-04-02', 2);
INSERT INTO Ticket (Description, Type, Date, User_ID) VALUES ('Need replacement for hardware', 'Hardware', '2024-04-03', 3);


INSERT INTO Contact (Contact_No, User_ID) VALUES ('555-1234', 1);
INSERT INTO Contact (Contact_No, User_ID) VALUES ('555-5678', 2);
INSERT INTO Contact (Contact_No, User_ID) VALUES ('555-9101', 3);


INSERT INTO Result (First_Name, Last_Name, Exam_Result, Pass_Mark, Pass_Fail, User_ID) VALUES ('Alice', 'Johnson', '85%', 50, 'Pass', 1);
INSERT INTO Result (First_Name, Last_Name, Exam_Result, Pass_Mark, Pass_Fail, User_ID) VALUES ('Bob', 'Wilson', '75%', 50, 'Pass', 2);
INSERT INTO Result (First_Name, Last_Name, Exam_Result, Pass_Mark, Pass_Fail, User_ID) VALUES ('Carol', 'Taylor', '65%', 50, 'Fail', 3);


INSERT INTO Promotion (Recommended_on, Recommended_by, Approved_on, Approved_by, User_ID) VALUES ('2024-04-01', 1, '2024-04-05', 'Supervisor1', 1);
INSERT INTO Promotion (Recommended_on, Recommended_by, Approved_on, Approved_by, User_ID) VALUES ('2024-05-01', 2, '2024-05-05', 'Supervisor2', 2);
INSERT INTO Promotion (Recommended_on, Recommended_by, Approved_on, Approved_by, User_ID) VALUES ('2024-06-01', 3, '2024-06-05', 'Supervisor3', 3);


INSERT INTO Training (Venue, Date, Status, Department_ID, User_ID) VALUES ('Conference Room A', '2024-07-01', 'Scheduled', 1, 1);
INSERT INTO Training (Venue, Date, Status, Department_ID, User_ID) VALUES ('Conference Room B', '2024-07-02', 'Scheduled', 2, 2);
INSERT INTO Training (Venue, Date, Status, Department_ID, User_ID) VALUES ('Conference Room C', '2024-07-03', 'Cancelled', 3, 3);

INSERT INTO Risk (Risk_Description, Risk_Level, Department_ID) VALUES ('Data breach risk', 'High', 2);
INSERT INTO Risk (Risk_Description, Risk_Level, Department_ID) VALUES ('Employee turnover', 'Medium', 1);
INSERT INTO Risk (Risk_Description, Risk_Level, Department_ID) VALUES ('Financial compliance risk', 'Critical', 3);



INSERT INTO Questions (question, answer, add_on, CreatedBy, Exam_ID) VALUES ('What is 2+2?', '4', '2024-05-01', '1', 1);
INSERT INTO Questions (question, answer, add_on, CreatedBy, Exam_ID) VALUES ('State Newtons first law.', 'Inertia', '2024-04-15', '2', 2);
INSERT INTO Questions (question, answer, add_on, CreatedBy, Exam_ID) VALUES ('What is the chemical symbol for water?', 'H2O', '2024-04-20', '3', 3);

INSERT INTO Answers (answer, Question_ID, Exam_ID, User_ID) VALUES ('4', 1, 1, 1);
INSERT INTO Answers (answer, Question_ID, Exam_ID, User_ID) VALUES ('Law of motion', 2, 2, 2);
INSERT INTO Answers (answer, Question_ID, Exam_ID, User_ID) VALUES ('Water', 3, 3, 3);








