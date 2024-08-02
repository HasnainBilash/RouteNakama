-- User table
CREATE TABLE user (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    password VARCHAR(100),
    phone VARCHAR(20)
);

-- trains
CREATE TABLE trains(
    trainName VARCHAR(50),
    stationName VARCHAR(50),
    departureTime TIME,
    PRIMARY KEY (trainName, stationName) 
);