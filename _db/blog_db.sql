SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

-- Table structure for table `admin`
CREATE TABLE
  `admin` (
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `admin` (
    `id`,
    `first_name`,
    `last_name`,
    `username`,
    `password`
  )
VALUES
  (
    1,
    'Jayesh',
    'sharma',
    'admin',
    '$2y$10$kggeKkIs6rEWf.p/6muJCOepa8zY4DcDU3CBZua8iNc9SBM3MMGym'
  );

-- Table structure for table `category`
CREATE TABLE
  `category` (
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `category` varchar(127) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `category` (`id`, `category`)
VALUES
  (1, 'Science'),
  (2, 'Technology'),
  (3, 'Biology'),
  (4, 'Poems'),
  (5, 'Programming');

-- Table structure for table `post`
CREATE TABLE
  `post` (
    `post_id` int (11) NOT NULL AUTO_INCREMENT,
    `post_title` varchar(127) NOT NULL,
    `post_text` text NOT NULL,
    `category` int (11) NOT NULL,
    `publish` int (2) NOT NULL DEFAULT 1,
    `cover_url` varchar(255) NOT NULL DEFAULT 'default.jpg',
    `created_at` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`post_id`),
    CONSTRAINT `fk_post_category` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `post` (
    `post_title`,
    `post_text`,
    `category`,
    `cover_url`
  )
VALUES
(
  'The Internet of Things: A Connected World',
  'The <b>Internet of Things (IoT)</b> links everyday objects—phones, cars, appliances, even clothing—<b>through the web</b>. 
   <br><br>These smart devices <b>collect and share data</b>, making life easier and more efficient. 
   <br><br>Imagine a <b>fridge that reminds you when milk is running low</b>, or a <b>smartwatch tracking your health</b> in real-time. 
   <br><br>IoT also powers <b>smart cities</b> with traffic control, energy efficiency, and public safety systems. 
   <br><br>While its potential is vast, IoT raises concerns about <b>data privacy and security</b>, 
   <br><br>reminding us that <b>innovation must balance convenience with responsibility</b>.',
  1,
  '001.jpg'
),

(
  'The Rise of Renewable Energy',
  'As the world seeks sustainable solutions, <b>renewable energy</b> is at the <b>forefront of innovation</b>.  
   <br><br><b>Solar panels, wind turbines, and hydroelectric systems</b> are transforming how we power our homes and industries.  
   <br><br>Unlike fossil fuels, these sources are <b>clean, abundant, and reduce carbon emissions</b>.  
   <br><br>Advances in <b>battery storage and smart grids</b> make renewable energy more reliable than ever before.  
   <br><br>From <b>rural villages gaining electricity</b> for the first time to <b>large cities cutting their carbon footprint</b>,  
   <br><br>renewables are shaping a <b>cleaner, greener future</b> for generations to come.',
  1,
  '002.jpg'
),

(
  'The Promise of Space Exploration',
  '<b>Space exploration</b> has always captured human imagination, but today it is <b>advancing faster than ever</b>.  
   <br><br>Private companies and international space agencies are working on missions to the <b>Moon, Mars, and beyond</b>.  
   <br><br>Telescopes like <b>James Webb</b> are revealing secrets of the early universe, while satellites <b>monitor Earth’s climate</b> in real-time.  
   <br><br>Space technologies also improve life on Earth, from <b>GPS</b> to <b>weather forecasting</b>.  
   <br><br>As we push the boundaries of exploration, new challenges arise—<b>radiation, long-duration travel, and resource use</b>—  
   <br><br>but the pursuit of discovery ensures <b>humanity’s story continues among the stars</b>.',
  2,
  '003.jpg'
),


(
  'The Power of Nanotechnology',
  '<b>Nanotechnology</b> works at the <b>scale of atoms and molecules</b>, unlocking possibilities once thought impossible.  
   <br><br>From <b>targeted drug delivery</b> that fights cancer cells directly, to <b>stronger lightweight materials</b> for space travel,  
   <br><br>nanotech is shaping the future of <b>medicine, engineering, and energy</b>.  
   <br><br>Even everyday products like <b>sunscreen and clothing</b> already use nanomaterials.  
   <br><br>But with such power comes responsibility—<b>ethical and safety concerns</b> must be addressed.  
   <br><br>As scientists continue to innovate, nanotechnology stands as a reminder that <b>even the smallest scale  
   can have the biggest impact</b> on human progress.',
  2,
  '004.jpg'
),
(
  'The Hidden World of Microbes',
  'Though invisible to the naked eye, <b>microbes</b> shape nearly every aspect of life on Earth.  
   <br><br>They live in our <b>bodies</b>, helping us <b>digest food</b> and <b>strengthen immunity</b>, while also <b>recycling nutrients</b> in ecosystems.  
   <br><br>Some microbes cause <b>disease</b>, but many more <b>sustain life and drive evolution</b>.  
   <br><br>From <b>brewing bread and cheese</b> to <b>producing lifesaving antibiotics</b>, humans have relied on these tiny organisms for centuries.  
   <br><br>As <b>microbiology advances</b>, scientists are uncovering how microbes may help solve <b>global challenges</b>—  
   <br><br>from <b>climate change</b> to <b>renewable energy</b>—showing that <b>small life forms can have enormous impact</b>.',
  3,
  '005.jpg'
),

(
  'Epigenetics: Beyond DNA',
  'For years, <b>DNA</b> was seen as the <b>unchangeable blueprint of life</b>, but <b>epigenetics</b> tells a deeper story.  
   <br><br><b>Epigenetic changes</b> do not alter the DNA sequence itself but <b>switch genes on or off</b>,  
   <br><br>influenced by <b>environment, diet, stress</b>, and even <b>experiences passed from parents to children</b>.  
   <br><br>This explains why <b>identical twins</b> can develop differently and how <b>lifestyle choices</b> affect long-term health.  
   <br><br>Researchers are exploring <b>epigenetic therapies</b> to treat <b>cancer, mental illness, and aging-related diseases</b>.  
   <br><br><b>Epigenetics</b> reminds us that <b>our genes are not destiny</b>—they interact constantly with the <b>world around us</b>.',
  3,
  '006.jpg'
),



  (
  'The Ocean Within',
  'Beneath the surface, calm and deep,  
   <br>Lies an ocean where our secrets sleep.  
   <br>Each wave a memory, soft or wild,  
   <br>The laughter of youth, the tears of a child.  <br><br> 


   <br>The tide pulls back, then rushes near,  
   <br>Echoing whispers we long to hear.  
   <br>A current of dreams drifts far away,  
   <br>Yet circles back at the break of day.  <br><br> 


   <br>Stars above and salt below,  
   <br>Guide the spirit where it must go.  
   <br>The moonlight paints a silver stream,  
   <br>Uniting earth with every dream.  <br><br> 


   <br>Ships of thought across it glide,  
   <br>Carrying hopes we cannot hide.  
   <br>Storms may rage, the waters churn,  
   <br>But from each tempest we always learn.  <br><br> 


   <br>The ocean within is vast and wide,  
   <br>A mirror of the soul inside.  
   <br>No map can chart its endless span,  
   <br>No compass tells where it began.  <br><br> 


   <br>And when the world feels harsh and small,  
   <br>That ocean waits to embrace it all.  
   <br>For in its depths, both dark and bright,  
   <br>We find the strength to sail through night.',
  4,
  '007.jpg'
),

 (
  'The Garden of Time',
  'In a quiet place where the hours grow,  
   <br>There blooms a garden the world may not know.  
   <br>Petals of memory, soft and rare,  
   <br>Whisper of journeys that led us here.  <br><br> 


   <br>The roses of youth, bright and bold,  
   <br>Hold stories of dreams we once told.  
   <br>Yet thorns remind with gentle sting,  
   <br>That change is the season all moments bring.  
<br><br> 

   <br>The lilies of love, pure and white,  
   <br>Glow softly beneath the silver night.  
   <br>Their fragrance lingers, tender, true,  
   <br>A reminder of bonds that carry us through.  
<br><br> 

   <br>Vines of regret may climb the wall,  
   <br>But even they have lessons to call.  
   <br>For every shadow the branches weave,  
   <br>Gives depth to the light we choose to believe.  
<br><br> 

   <br>And in the center, a timeless tree,  
   <br>Its roots are strong, its branches free.  
   <br>Each leaf a moment, each fruit a choice,  
   <br>Each rustling sound a forgotten voice.  
<br><br> 

   <br>So walk this garden, soft and slow,  
   <br>For here is where the hours grow.  
   <br>Gather the blossoms, carry them near,  
   <br>The garden of time is always here.',
  4,
  '008.jpg'
),

(
  'The Song of the Stars',
  'Above the earth, in endless flight,  
   <br>The stars awaken in velvet night.  
   <br>Each one a flame, a timeless spark,  
   <br>A lantern burning in the dark.  <br><br> 


   <br>They whisper tales of ages past,  
   <br>Of galaxies born, of shadows cast.  
   <br>Their silence speaks, profound and deep,  
   <br>A lullaby for the world to keep. <br><br> 

   <br>The moon drifts slow, a silver guide,  
   <br>While constellations stretch and stride.  
   <br>Orion hunts, the Pleiades sing,  
   <br>And comets trace their fleeting wings.  <br><br> 


   <br>We gaze above with wondering eyes,  
   <br>Seeking meaning in the skies.  
   <br>Are we alone, or do they see,  
   <br>The fragile hopes of humanity?  <br><br> 


   <br>Yet in their glow, we find our place,  
   <br>A fleeting spark in endless space.  
   <br>The stars remind, though vast we roam,  
   <br>The universe is both strange and home.  <br><br> 


   <br>So let us dream beneath their light,  
   <br>And sail through time on wings of night.  
   <br>For in the stars, our stories lie—  
   <br>A song eternal across the sky.',
  4,
  '009.jpg'
),

(
  'The Journey of a Programmer',
  '<b>Programming</b> is more than writing code—it is the <b>art of solving problems</b> and <b>creating something from nothing</b>.  
   <br><br>Each line of code is like a <b>brushstroke on a digital canvas</b>, shaping ideas into reality.  
   <br><br>From the first <b>“Hello, World!”</b> to building <b>complex systems</b>, programmers embark on a <b>journey of constant learning</b>.  

   <br><br><b>Logic, algorithms, and data structures</b> form the foundation, but <b>creativity drives innovation</b>.  
   <br><br>A simple script might <b>automate a task</b>, while a powerful application can <b>connect millions of people</b> worldwide.  
   <br><br><b>Programming languages</b>—Python, Java, C++, and more—are <b>tools</b>, each with strengths for different challenges.  

   <br><br>Yet beyond syntax and debugging lies <b>patience and persistence</b>.  
   <br><br>Mistakes are inevitable, but every <b>error message is a teacher</b>.  
   <br><br>The thrill of <b>fixing a stubborn bug</b> or <b>watching code finally run</b> is a reward like no other.  

   <br><br>In today’s world, programming <b>powers everything</b>—from <b>phones and games</b> to <b>artificial intelligence and space exploration</b>.  
   <br><br>It is not just a career but a <b>mindset</b>: <b>think logically, adapt quickly, and never stop experimenting</b>.  
   <br><br>The <b>journey of a programmer is endless</b>, and with each new project, the <b>possibilities expand</b>.',
  5,
  '0010.jpg'
),

(
  'Coding the Future',
  'Every <b>innovation</b> we see today—<b>smartphones, self-driving cars, artificial intelligence</b>—exists because of <b>code</b>.  
   <br><br><b>Coding</b> is the <b>invisible language</b> of our modern world, shaping the way people <b>live, work, and connect</b>.  
   <br><br>At its core, coding is about <b>giving instructions to machines</b>, but in practice it is much more:  
   <br><br>a <b>creative act</b> that combines <b>logic, precision, and imagination</b>.  

   <br><br>With just a <b>few lines</b>, a programmer can <b>design an app</b>, <b>automate a business</b>, or even <b>simulate a universe</b>.  
   <br><br><b>Frameworks and libraries</b> accelerate this process, allowing developers to <b>stand on the shoulders of giants</b>.  
   <br><br><b>Collaboration is key</b>—<b>open-source projects</b> demonstrate how <b>thousands of minds</b> can contribute to a single idea.  

   <br><br>The journey is rarely smooth. <b>Errors and bugs</b> often hide in plain sight, testing <b>patience and persistence</b>.  
   <br><br>But with every <b>failure comes growth</b>, and every <b>successful run sparks achievement</b>.  

   <br><br>As technology evolves, so too does <b>programming</b>.  
   <br><br><b>New languages, tools, and paradigms</b> emerge, but the essence remains: <b>solving problems through structured thought</b>.  
   <br><br><b>Coding</b> is not just about <b>machines</b>—it is about <b>people, progress, and the limitless potential of the future</b>.',
  5,
  '0011.jpg'
);


-- Table structure for table `users`
CREATE TABLE
  `users` (
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `fname` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
  `users` (`id`, `fname`, `username`, `password`)
VALUES
  (
    1,
    'Manish',
    'dube',
    '$2y$10$5KdCaBOhNE6HZOmn39jO4OOyKUI1xC1St51KH8DhtXGX8drct98/q'
  ),
  (
    2,
    'Hardik',
    'Patel',
    '$2y$10$KpVvp9ixSCn/9FMR3k0tn.0Oul5lf2jGaCGPOgKyyxQTdyMk8xtlG'
  );

-- Table structure for table `contact_messages`
CREATE TABLE
  `contact_messages` (
    `id` int (11) AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `subject` varchar(255) NOT NULL,
    `message` text NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `status` ENUM ('unread', 'read') DEFAULT 'unread'
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

COMMIT;