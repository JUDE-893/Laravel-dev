DELIMITER$$
CREATE PROCEDURE sample_bookings()
  BEGIN

    -- Clear table
    DELETE FROM guests;
    --reset Auto_Increment
    ALTER TABLE guests AUTO_INCREMENT = 1;
    -- Fill Table
    INSERT INTO bookings (
        created_at, updated_at, start_date, end_date, num_nights, num_guests,
        cabin_price, extra_price, total_price, status,
        has_breakfast, is_paid, observation, cabin_id, guest_id
    ) VALUES
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 1', 1, 1),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 2', 2, 2),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-out', 1, 1, 'Observation 3', 3, 3),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 4', 4, 4),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 5', 5, 5),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 6', 6, 6),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-out', 1, 1, 'Observation 7', 7, 7),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 8', 8, 8),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 9', 9, 9),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 10', 10, 10),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-out', 1, 1, 'Observation 11', 1, 11),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 12', 2, 12),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 13', 3, 13),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 14', 4, 14),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 15', 5, 15),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-out', 1, 1, 'Observation 16', 6, 16),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 17', 7, 17),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 18', 8, 18),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 19', 9, 19),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 20', 10, 20),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 21', 1, 21),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-out', 1, 1, 'Observation 22', 2, 22),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 23', 3, 23),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 24', 4, 24),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 25', 5, 25),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 26', 6, 26),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 27', 7, 27),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-in', 1, 1, 'Observation 28', 8, 28),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'confirmed', 1, 1, 'Observation 29', 9, 29),
    (NOW(), NOW(), DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), DATE_ADD(DATE_ADD(NOW(), INTERVAL FLOOR(RAND() * 30) DAY), INTERVAL 7 DAY), 7, 2, 150, 50, 200, 'checked-out', 1, 1, 'Observation 30', 10, 30);

    UPDATE bookings SET status = 'unconfirmed' WHERE status = 'confirmed' ;
  END$$



--guest sample data initiator
DELIMITER $$
CREATE PROCEDURE guest_sample()
  BEGIN

    -- Clear table
    DELETE FROM guests;
    --reset Auto_Increment
    ALTER TABLE guests AUTO_INCREMENT = 1;
    -- Fill Table
    INSERT INTO guests (
         full_name, email, national_id, nationality, country_flag
    ) VALUES
    ( 'John Doe', 'john.doe@example.com', 'NID123456', 'American', '🇺🇸'),
    ( 'Jane Smith', 'jane.smith@example.com', 'NID789012', 'British', '🇬🇧'),
    ( 'Carlos Garcia', 'carlos.garcia@example.com', 'NID345678', 'Mexican', '🇲🇽'),
    ( 'Emily Johnson', 'emily.johnson@example.com', 'NID901234', 'Canadian', '🇨🇦'),
    ( 'Sophia Brown', 'sophia.brown@example.com', 'NID567890', 'Australian', '🇦🇺'),
    ( 'Liam Davis', 'liam.davis@example.com', 'NID123457', 'Irish', '🇮🇪'),
    ( 'Olivia Wilson', 'olivia.wilson@example.com', 'NID789013', 'German', '🇩🇪'),
    ( 'Noah Miller', 'noah.miller@example.com', 'NID345679', 'French', '🇫🇷'),
    ( 'Ava Martinez', 'ava.martinez@example.com', 'NID901235', 'Spanish', '🇪🇸'),
    ( 'Isabella Anderson', 'isabella.anderson@example.com', 'NID567891', 'Italian', '🇮🇹'),
    ( 'Ethan Thomas', 'ethan.thomas@example.com', 'NID123458', 'Dutch', '🇳🇱'),
    ( 'Mia Lee', 'mia.lee@example.com', 'NID789014', 'Chinese', '🇨🇳'),
    ( 'Alexander Harris', 'alexander.harris@example.com', 'NID345680', 'Japanese', '🇯🇵'),
    ( 'Amelia Clark', 'amelia.clark@example.com', 'NID901236', 'Korean', '🇰🇷'),
    ( 'James Lewis', 'james.lewis@example.com', 'NID567892', 'Brazilian', '🇧🇷'),
    ( 'Charlotte Robinson', 'charlotte.robinson@example.com', 'NID123459', 'Russian', '🇷🇺'),
    ( 'Benjamin Walker', 'benjamin.walker@example.com', 'NID789015', 'Indian', '🇮🇳'),
    ( 'Harper Scott', 'harper.scott@example.com', 'NID345681', 'South African', '🇿🇦'),
    ( 'Henry Young', 'henry.young@example.com', 'NID901237', 'Egyptian', '🇪🇬'),
    ( 'Ella King', 'ella.king@example.com', 'NID567893', 'Turkish', '🇹🇷'),
    ( 'Lucas Adams', 'lucas.adams@example.com', 'NID123460', 'Greek', '🇬🇷'),
    ( 'Aria Hill', 'aria.hill@example.com', 'NID789016', 'Swedish', '🇸🇪'),
    ( 'Michael Green', 'michael.green@example.com', 'NID345682', 'Norwegian', '🇳🇴'),
    ( 'Mila Baker', 'mila.baker@example.com', 'NID901238', 'Finnish', '🇫🇮'),
    ( 'William Gonzalez', 'william.gonzalez@example.com', 'NID567894', 'Argentinian', '🇦🇷'),
    ( 'Emily Perez', 'emily.perez@example.com', 'NID123461', 'Chilean', '🇨🇱'),
    ( 'Jack Turner', 'jack.turner@example.com', 'NID789017', 'Peruvian', '🇵🇪'),
    ( 'Avery Parker', 'avery.parker@example.com', 'NID345683', 'Colombian', '🇨🇴'),
    ( 'Sebastian Campbell', 'sebastian.campbell@example.com', 'NID901239', 'Venezuelan', '🇻🇪'),
    ( 'Evelyn Rivera', 'evelyn.rivera@example.com', 'NID567895', 'Portuguese', '🇵🇹');
  END $$
