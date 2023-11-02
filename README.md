### users
    id INT A_I
    name VARCHAR
    email VARCHAR UNIQUE
    password VARCHAR
    role ENUM("eacher; student, admin) 
    gerden ENUM('male', "emale, 'another')
    phone number INT(10)
    location VARCHAR
    status ENUM( 'Currently Enrolled", Dropped Out; Leave of Absence) NULL title ENUM('Lecturer', Associate Professor', Professor') NULL department VARCHAR NULL notes VARCHAR NULL 
    created_ at TIMESTAMP NULL 
    update at TIMESTAMP NULL 
    delete_at TIMESTAMP NULL

### classes
    id INT A_I
    name VARCHAR
    user id INT FOREIGN KEY
    begin _date DATE
    end_date DATE
    created _at TIMESTAMP NULL 
    update at TIMESTAMP NULL 
    delete at TIMESTAMP NULL

### class_members
    id INT A_I
    user_id NT FOREIGN KEY
    class id INT FOREIGN KEY
    note VARCHAR NULL

### class_subjects
    id INT A_I
    class_id INT FOREIGN KEY
    subject id INT FOREIGN KEY
    note VARCHAR NULL

### subjects (môn học)
    id INT A_I
    name VARCHAR
    credits INT
    note VARCHAR NULL
    created_at TIMESTAMP NULL 
    update at TIMESTAMP NULL 
    delete_at TIMESTAMP NULL

### lessons (buổi học)
    id INT A_I
    time_begin DATETIME
    location_ id VARCHAR FOREIGN KEY
    created at TIMESTAMP NULL update at TIMESTAMP NULL delete at TIMESTAMP NULL class_id INT FORIEGN KEY

### locations
    id INT A_I
    name VARCHAR
    address VARCHAR
    created_at TIMESTAMP NULL
    delete _at TIMESTAMP NULL
    update_at TIMESTAMP NULL

### attendances
    id INT A_I
    user_id VARCHAR FOIEGN KEY
    status ENUM( 'present', 'absent', late') note VARCHAR NULL
    lession id INT FORIEGN KEY