CREATE TABLE Admin(
    ID_admin INT AUTO_INCREMENT PRIMARY KEY,
    Full_name VARCHAR(250),
    Email VARCHAR(250) NOT NULL,
    CIN VARCHAR(50),
    Phone VARCHAR(50),
    Password VARCHAR(250),
    Dt_create_account DATE
);
CREATE TABLE AdminDoctor (
    ID_admin INT,
    ID_Doctor INT,
    FOREIGN KEY (ID_admin) REFERENCES Admin (ID_admin),
    FOREIGN KEY (ID_Doctor) REFERENCES Doctor (ID_Doctor)
);


CREATE TABLE Doctor(
    ID_Doctor INT AUTO_INCREMENT PRIMARY KEY,
    Full_name VARCHAR(250),
    Specialty VARCHAR(250),
    Email VARCHAR(250),
    CIN INT NOT NULL,
    Phone VARCHAR(250),
    Password VARCHAR(250),
    Dt_create_account VARCHAR(50),
    ID_admin INT NOT NULL,
    FOREIGN KEY(ID_admin) REFERENCES Admin(ID_admin)
);

INSERT INTO Doctor (Full_name, Specialty, Email, CIN, Phone, Password, Dt_create_account, ID_admin)
VALUES
    ('John Doe', 'Cardiology', 'johndoe@example.com', 1234567890, '123-456-7890', 'password1', '2023-06-11', 1),
    ('Jane Smith', 'Pediatrics', 'janesmith@example.com', 9876543210, '987-654-3210', 'password2', '2023-06-11', 1),
    ('Robert Johnson', 'Dermatology', 'robertjohnson@example.com', 4567891230, '456-789-1230', 'password3', '2023-06-11', 2);

      INSERT INTO Doctor (Full_name, Specialty, Email, CIN, Phone, Password, Dt_create_account, ID_admin)
            VALUES
            ('John Doe', 'Cardiology', 'johndoe@example.com', 1234567890, '123-456-7890', 'password1', '2023-06-11', 1),
            ('Jane Smith', 'Pediatrics', 'janesmith@example.com', 9876543210, '987-654-3210', 'password2', '2023-06-11', 1),
            ('Robert Johnson', 'Dermatology', 'robertjohnson@example.com', 4567891230, '456-789-1230', 'password3', '2023-06-11', 2),
            ('John Smith', 'Orthopedics', 'johnsmith@example.com', 1234567891, '123-456-7891', 'password4', '2023-06-11', 1),
            ('Sarah Davis', 'Gastroenterology', 'sarahdavis@example.com', 9876543211, '987-654-3211', 'password5', '2023-06-11', 1),
            ('Michael Johnson', 'Ophthalmology', 'michaeljohnson@example.com', 4567891231, '456-789-1231', 'password6', '2023-06-11', 2),
            ('Emily Wilson', 'Neurology', 'emilywilson@example.com', 1234567892, '123-456-7892', 'password7', '2023-06-11', 1),
            ('David Brown', 'Dentistry', 'davidbrown@example.com', 9876543212, '987-654-3212', 'password8', '2023-06-11', 2),
            ('Jennifer Miller', 'Psychiatry', 'jennifermiller@example.com', 4567891232, '456-789-1232', 'password9', '2023-06-11', 1),
            ('Daniel Wilson', 'Urology', 'danielwilson@example.com', 1234567893, '123-456-7893', 'password10', '2023-06-11', 2),
            ('Sophia Johnson', 'Dermatology', 'sophiajohnson@example.com', 9876543213, '987-654-3213', 'password11', '2023-06-11', 1),
            ('William Davis', 'Cardiology', 'williamdavis@example.com', 4567891233, '456-789-1233', 'password12', '2023-06-11', 2),
            ('Olivia Wilson', 'Pediatrics', 'oliviawilson@example.com', 1234567894, '123-456-7894', 'password13', '2023-06-11', 1),
            ('James Johnson', 'Orthopedics', 'jamesjohnson@example.com', 9876543214, '987-654-3214', 'password14', '2023-06-11', 2),
            ('Emma Davis', 'Gastroenterology', 'emmadavis@example.com', 4567891234, '456-789-1234', 'password15', '2023-06-11', 1)";
    


CREATE TABLE Patient_details(
    ID_patient INT AUTO_INCREMENT PRIMARY KEY,
    Full_name VARCHAR(250),
    Age INT,
    CIN VARCHAR(250),
    Patient_Gender VARCHAR(50),
    Phone VARCHAR(50),
    Date_of_visit DATE,
    allergy VARCHAR(50),
    CurrMeds VARCHAR(50),
    ID_admin INT NOT NULL,
    FOREIGN KEY(ID_admin) REFERENCES Admin(ID_admin)
);

CREATE TABLE consulter (
    ID_Consultation INT AUTO_INCREMENT PRIMARY KEY,
    ID_Doctor INT,
    ID_Patient INT,
    Weight INT,
    Blood_Pressure VARCHAR(50),
    Current_Medications VARCHAR(150),
    Temperature INT,
    Date_Modified DATE,
    Blood_Sugar VARCHAR(250),
    Modifier_Date DATE,
    FOREIGN KEY (ID_Doctor) REFERENCES Doctor(ID_Doctor),
    FOREIGN KEY (ID_Patient) REFERENCES Patient_Details(ID_Patient)
);
