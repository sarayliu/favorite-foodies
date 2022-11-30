-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 06:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`title`, `date`, `venue`, `description`) VALUES
('Arts and Culinary Festival', '0000-00-00', 'Foxchase Manor', 'Enjoy a wide variety of tastes'),
('Beginner Cooking Class', '0000-00-00', 'Thornton Hall', 'For all the college students who do not know how to cook'),
('Mysterious New Recipes', '0000-00-00', 'Fedex Field', NULL),
('Sushi 101', '0000-00-00', 'Great Falls Park', 'Delicious sushi in the middle of the forest'),
('The Art of Cocktails', '0000-00-00', 'Hilton', 'Yummy for your tummy'),
('Virginia Wine Festival', '0000-00-00', 'Rice Hall', 'A wine festival for all ages');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_name` varchar(255) NOT NULL,
  `cuisine` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `health_score` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_name`, `cuisine`, `rating`, `health_score`, `image`, `url`) VALUES
('Burger', NULL, 6, 19, 'https://webknox.com/recipeImages/362230-556x370.jpg', 'https://spoonacular.com/recipes/burger-362230'),
('Burrito Bake', 'mexican', 8, 7, 'https://webknox.com/recipeImages/368173-556x370.jpg', 'https://spoonacular.com/recipes/burrito-bake-368173'),
('Ice Cream Cake', NULL, 10, 1, 'https://webknox.com/recipeImages/64963-556x370.jpg', 'https://spoonacular.com/recipes/burger-362230'),
('Pasta Carbonara', 'mediterranean', 7, 13, 'https://webknox.com/recipeImages/933740-556x370.jpg', 'https://spoonacular.com/recipes/pasta-carbonara-933740'),
('Pasta Verde', NULL, 3, 90, 'https://webknox.com/recipeImages/36791-556x370.jpg', 'https://spoonacular.com/recipes/pasta-verde-36791'),
('Pasta with Garlic, Scallions, Cauliflower & Breadcrumbs', NULL, 5, 19, 'https://spoonacular.com/recipeImages/716429-312x231.jpg', 'https://spoonacular.com/recipes/pasta-with-garlic-scallions-cauliflower-breadcrumbs-716429'),
('Pizza', NULL, 9, 15, 'https://webknox.com/recipeImages/108172-556x370.jpg', 'https://spoonacular.com/recipes/pizza-108172'),
('Sushi Bowls', NULL, 8, 35, 'https://webknox.com/recipeImages/591370-556x370.jpg', 'https://spoonacular.com/recipes/sushi-bowls-591370'),
('Sushi Rolls', NULL, 8, 7, 'https://webknox.com/recipeImages/620287-556x370.jpg', 'https://spoonacular.com/recipes/sushi-rolls-620287'),
('Tea loaf', NULL, 6, 1, 'https://webknox.com/recipeImages/1084674-556x370.jpg', 'https://spoonacular.com/recipes/tea-loaf-1084674'),
('Tofu Tacos', 'mexican', 6, 31, 'https://webknox.com/recipeImages/395522-556x370.jpg', 'https://spoonacular.com/recipes/tofu-tacos-395522');

-- --------------------------------------------------------

--
-- Table structure for table `has_favorite`
--

CREATE TABLE `has_favorite` (
  `username` varchar(100) NOT NULL,
  `food_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has_favorite`
--

INSERT INTO `has_favorite` (`username`, `food_name`) VALUES
('user1', 'Pasta Carbonara'),
('user1', 'Pasta Verde'),
('user10', 'Ice Cream Cake'),
('user10', 'Pizza'),
('user2', 'Sushi Bowls'),
('user3', 'Pizza'),
('user4', 'Burrito Bake'),
('user4', 'Tofu Tacos'),
('user5', 'Sushi Rolls'),
('user6', 'Pasta Verde'),
('user6', 'Pasta with Garlic'),
('user6', 'Tea Loaf'),
('user7', 'Pizza'),
('user8', 'Burger'),
('user9', 'Tofu Tacos');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `venue` varchar(100) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`venue`, `city`) VALUES
('Fedex Field', 'Summerfield'),
('Foxchase Manor', 'Manassas'),
('Great Falls Park', 'Great Falls'),
('Hilton', 'Fairfax'),
('Marriott', 'Herndon'),
('Rice Hall', 'Charlottesville'),
('Scott Stadium', 'Charlottesville'),
('Thornton Hall', 'Charlottesville');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `url` varchar(500) NOT NULL,
  `serving_size` int(11) DEFAULT NULL,
  `instructions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`url`, `serving_size`, `instructions`) VALUES
('https://spoonacular.com/recipes/burger-362230', 6, 'Prepare a charcoal grill and position the rack 4 inches above medium-high heat, or heat a gas grill to medium-high heat. Lightly oil the grill. Form the beef into 6 patties, about 3 1/2 inches in diameter, and sprinkle on both sides with the salt and pepper. Grill the burgers, charring well on both sides, until almost but not quite as done as desired, 3 to 4 minutes per side for medium-rare. (Gas grills may require 1 to 2 minutes more total cooking.) Transfer the burgers to a rack to rest for 5 minutes. Top each burger with about 1/2 tablespoon of the butter and a sprinkling of the chopped parsley. Meanwhile, toast the English Muffins on the grill for 2 to 3 minutes. Reheat the burgers on the grill for about 1 minute. Serve them on the toasted English muffins, topped with the tomato slices.'),
('https://spoonacular.com/recipes/burrito-bake-368173', 6, 'Preheat oven to 350°. In a large skillet, cook beef over medium heat until no longer pink; drain. Add beans, onion and taco seasoning. Unroll crescent roll dough. Press onto the bottom and up the sides of a greased 13x9-in. baking dish; seal seams and perforations. Spread beef mixture over crust; sprinkle with cheeses. Bake, uncovered, 30 minutes or until golden brown. Sprinkle with toppings of your choice.'),
('https://spoonacular.com/recipes/ice-cream-cake-64963', 12, 'Set aside 12 cookies. Crush remaining cookies; mix with butter. Press 2/3 onto bottom of 9-inch springform pan. Stand reserved cookies around edge. Microwave 1/2 cup fudge topping as directed on package; drizzle over crust. Freeze 15 min. Soften 1-1/2 cups of each flavor ice cream; spread, 1 flavor at a time, over fudge layer in crust. Sprinkle with remaining crumb mixture. Scoop remaining ice cream into balls; place over crumb layer. Freeze 4 hours or until firm. When ready to serve, top dessert with COOL WHIP. Microwave remaining fudge topping as directed on package; drizzle over dessert. Garnish with cherries'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 6, 'Add bacon and 1/2 cup of the water to a large non-stick skillet and bring to a simmer over medium-high heat. Allow to simmer until water evaporates about 6 - 7 minutes, then reduce heat to medium-low and continue to cook until bacon is brown and crisp, about 6 - 8 minutes longer. Place a fine mesh strainer over a bowl then pour bacon into strainer while reserving about 1 tsp of the rendered fat in pan. Return pan to heat and saute garlic about 30 seconds, until fragrant and lightly golden. Pour into a medium mixing bowl then add 1 Tbsp rendered bacon fat (drippings in bowl set under strainer) to mixing bowl with garlic. Add eggs, egg yolk, parmesan and pepper to garlic mixture and whisk until well combined.Meanwhile, bring 8 cups of water to a boil in a large dutch oven (no more than 8 cups because you want a very starchy water for the sauce). Add spaghetti and salt to boiling water and cook until al dente. While pasta is boiling, set a colander in a large bowl. Drain al dente pasta into colander in bowl, while reserving pasta water in bowl. Measure out 1 cup hot pasta water and discard remaining water. Place pasta in now empty large bowl. Slowly pour and whisk 1/2 cup pasta water into egg mixture, then slowly pour mixture over pasta while tossing to coat. Add bacon and toss to combine. Season with salt if desired. Let pasta rest, tossing frequently, 2 - 4 minutes until sauce has thickened slightly and coats pasta. Thin with remaining 1/2 cup hot pasta water as needed. Serve immediately topped with additional parmesan and parsley.Recipe source: adapted from Cooks Illustrated'),
('https://spoonacular.com/recipes/pasta-verde-36791', 4, 'Step 1. In a medium bowl whisk together mustard and vinegar. While whisking, slowly drizzle in 1/4 cup oil until emulsified. Season with salt and pepper. Set aside. Cook pasta in a large pot of boiling salted water until al dente according to package instructions, about 8 minutes. Drain; return to pot. Set aside.Step 2 Meanwhile, heat remaining 2 tablespoons oil in a large skillet over medium heat. Add onion; cook until just softened, about 4 minutes. Add zucchini; cook, stirring, until tender, about 4 minutes. Add snap peas and spinach; cook, stirring, until bright green, about 2 minutes. Remove from heat; stir in scallions and basil. Add to pasta along with vinaigrette; toss. Serve warm or at room temperature.'),
('https://spoonacular.com/recipes/pasta-with-garlic-scallions-cauliflower-breadcrumbs-716429', 3, 'In a large skillet, melt butter over medium heat until foamy. Then add bread crumbs, tossing to coat in butter, until toasted and lightly browned. Remove from pan into small bowl; mix in cheese and about a tablespoon of the green scallion tops. In the meantime, begin to prepare your pasta according to the directions on the package. While the pasta is cooking, put about a tablespoon of olive oil in the same pan you used for the bread crumbs. Over medium heat, add the garlic, whites of the scallions, and cauliflower to the skillet. Saute until the cauliflower shows some caramelization. Then add the wine until the florets are tender-crisp. Add salt, pepper, and red pepper flakes. When pasta is just shy of al dente, reserve about a cup of the cooking water and drain the pasta. Add the drained pasta to the skillet—still over medium heat—with the veggies and toss with some pasta water, as necessary (I added a little at a time; I ended up using about 1/2 cup), till the pasta is coated and turns easily. You may want to add another little drizzle of olive oil. Again, taste and season accordingly. Put into serving bowls and top with the bread crumb mixture. Sprinkle some more scallion greens on top.'),
('https://spoonacular.com/recipes/pizza-108172', 6, 'Place a pizza stone, unglazed ceramic tiles, or a heavy cookie sheet on the oven rack. Preheat oven to 400 F. If starting with pizza dough, pat or pull each piece into a 12-inch circle. Top each with some sauce, then scatter the chicken, basil, and mozzarella over each. Drizzle with olive oil. Sprinkle pizza stone with the cornmeal. Using the back of a cookie sheet, transfer the pizza to the oven. (You may have to bake the pizzas one at a time, depending on your oven size.) Bake 20 minutes or until the cheese is melted and the crust is browned.'),
('https://spoonacular.com/recipes/sushi-bowls-591370', 6, 'Place three cups of uncooked short grain rice in a medium pot. Cover the rice with cold water, swirl around then carefully pour off the water. Repeat this until the water is no longer cloudy (usually 3-4 rinses).After draining off the rinse water, add 3 cups of cold water to the pot. Bring to a boil over high heat without a lid. Once it comes to a boil, reduce the heat to warm and cook with a lid on for 10 minutes. After ten minutes, turn the heat off and let sit (with the lid still on) for an additional 15 minutes. Mix together the rice vinegar, sugar and salt. Microwave for 20 seconds and stir to dissolve the sugar and salt. Microwave additional time, if needed, to help the sugar and salt dissolve.Once the rice has finished cooking, dump it out from the pot into a large bowl. Sprinkle half of the vinegar/sugar/salt mixture onto the rice and gently fold it in until it is well incorporated (try not to squish the rice). Sprinkle the remainder of the vinegar mixture on the rice and fold it in again until it is evenly mixed and the rice looks shiny and is fairly sticky.While the rice is cooking, wash and cut/slice the cucumber, raddish, carrot (I shredded mine) and avocado. Place one cup of cooked sushi rice in each bowl and divide your toppings evenly between the six bowls. I like to arrange the toppings in a pretty way to make it feel even more like Im eating real sushi.Sprinkle -1/2 tsp of sesame seeds over each bowl. Crumble/tear the nori and top each bowl with a small amount (about sheet). See notes below for additional topping ideas, optional condiments and how to store the sushi bowls to enjoy later in the week!'),
('https://spoonacular.com/recipes/sushi-rolls-620287', 10, 'Prepare Sushi Rice. If you need a recipe or want to follow a detailed step-by-step instruction, please click here. Cover the sushi rice and the completed rolls with a damp cloth/plastic wrap at all times to prevent from drying. Cut both ends of the cucumber. Then cut in half lengthwise and cut again in half so you now have 4 strips. Remove the seeds with knife and cut in half lengthwise again. You should end up with 8 cucumber strips. For more check out Just One Cookbook'),
('https://spoonacular.com/recipes/tea-loaf-1084674', 10, 'Mix the sultanas, raisins and orange zest in a large mixing bowl. Pour over the tea and cover the bowl. Leave to sit for a minimum of 6 hours or ideally overnight to allow the dried fruit to soak up all the liquid. Heat the oven to 180C/160 fan/gas Grease and line a 900g loaf tin. Add the eggs, flour and sugar to the soaked fruit, ensuring everything is well combined. Spoon the mixture into the tin and place in the centre of the oven for 1 hour 30 mins or until firm to the touch. Leave to cool in the tin for 15 mins before transferring to a wire rack. Cut into thick slices and serve with butter. To store, wrap tightly and keep in an airtight container for up to five days. The loaf will taste even better after a few days'),
('https://spoonacular.com/recipes/tofu-tacos-395522', 4, 'Lay the tofu slices flat on a stack of paper towels; top with more paper towels, then put a heavy skillet on top to press out the excess water, about 10 minutes. Meanwhile, toss the coleslaw, radishes, cilantro, scallions, 1 tablespoon olive oil, the lime zest and half of the lime juice in a large bowl. Mix the yogurt with the remaining lime juice in a small bowl and season with salt and pepper. Brush the tofu on all sides with the remaining 1/2 tablespoon olive oil and sprinkle with the taco seasoning. Heat a nonstick skillet over medium-high heat, then add the tofu and cook until it begins to crisp, about 5 minutes; flip and cook 2 more minutes. Cut into strips. Toast the tortillas in a dry skillet, 1 minute per side, or wrap in a damp towel and microwave 1 minute. Fill with the tofu, cheese and slaw, then drizzle with the yogurt sauce and salsa. Serve with the lime wedges.');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `url` varchar(500) NOT NULL,
  `ingredient_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`url`, `ingredient_name`) VALUES
('https://spoonacular.com/recipes/burrito-bake-368173', 'canned refried beans'),
('https://spoonacular.com/recipes/burrito-bake-368173', 'ground beef'),
('https://spoonacular.com/recipes/burrito-bake-368173', 'onion'),
('https://spoonacular.com/recipes/burrito-bake-368173', 'refrigerated crescent rolls'),
('https://spoonacular.com/recipes/burrito-bake-368173', 'shredded cheddar cheese'),
('https://spoonacular.com/recipes/burrito-bake-368173', 'shredded part-skim mozzarella cheese'),
('https://spoonacular.com/recipes/burrito-bake-368173', 'taco seasoning'),
('https://spoonacular.com/recipes/ice-cream-cake-64963', 'butter'),
('https://spoonacular.com/recipes/ice-cream-cake-64963', 'chocolate chip cookies'),
('https://spoonacular.com/recipes/ice-cream-cake-64963', 'chocolate ice cream'),
('https://spoonacular.com/recipes/ice-cream-cake-64963', 'fudge ice cream topping'),
('https://spoonacular.com/recipes/ice-cream-cake-64963', 'maraschino cherries'),
('https://spoonacular.com/recipes/ice-cream-cake-64963', 'vanilla ice cream'),
('https://spoonacular.com/recipes/ice-cream-cake-64963', 'whipped topping'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'bacon'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'egg yolk'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'eggs'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'fresh parsley'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'garlic'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'linguine'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'parmesan cheese'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'salt and pepper'),
('https://spoonacular.com/recipes/pasta-carbonara-933740', 'water'),
('https://spoonacular.com/recipes/pizza-108172', 'cooked frozen filo dough'),
('https://spoonacular.com/recipes/pizza-108172', 'cooked shredded chicken'),
('https://spoonacular.com/recipes/pizza-108172', 'cornmeal'),
('https://spoonacular.com/recipes/pizza-108172', 'fresh basil'),
('https://spoonacular.com/recipes/pizza-108172', 'olive oil'),
('https://spoonacular.com/recipes/pizza-108172', 'shredded mozzarella'),
('https://spoonacular.com/recipes/pizza-108172', 'tomato sauce');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `username` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`username`, `url`, `comment`) VALUES
('user1', 'https://spoonacular.com/recipes/pasta-with-garlic-scallions-cauliflower-breadcrumbs-716429', 'Delicious'),
('user2', 'https://spoonacular.com/recipes/ice-cream-cake-64963', 'This is the best dessert I have ever tasted in my life'),
('user3', 'https://spoonacular.com/recipes/pizza-108172', 'This recipe was a solid meh for me. I think Papa Johns tastes better'),
('user4', 'https://spoonacular.com/recipes/pasta-verde-36791', 'I love the color green so this was great.'),
('user4', 'https://spoonacular.com/recipes/tofu-tacos-395522', 'I usually do not like tofu but these tacos were solid!'),
('user5', 'https://spoonacular.com/recipes/burrito-bake-368173', 'BURRITO BURRITO LETS GOOO!!'),
('user6', 'https://spoonacular.com/recipes/sushi-bowls-591370', 'Sushi is awesome yay'),
('user7', 'https://spoonacular.com/recipes/sushi-rolls-620287', 'Sushi ROLLS are better than Sushi BOWLS'),
('user8', 'https://spoonacular.com/recipes/tea-loaf-1084674', 'Channeling my inner uncle Iroh by eating tea loaf… watch ATLA');

-- --------------------------------------------------------

--
-- Table structure for table `rsvp`
--

CREATE TABLE `rsvp` (
  `username` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rsvp`
--

INSERT INTO `rsvp` (`username`, `title`) VALUES
('user1', 'Beginner Cooking Class'),
('user1', 'Mysterious New Recipes'),
('user1', 'Virginia Wine Festival'),
('user10', 'Beginner Cooking Class'),
('user10', 'Mysterious New Recipes'),
('user10', 'Virginia Wine Festival'),
('user2', 'Arts and Culinary Festival'),
('user2', 'Mysterious New Recipes'),
('user2', 'The Art of Cocktails'),
('user3', 'Beginner Cooking Class'),
('user3', 'Mysterious New Recipes'),
('user3', 'Sushi 101'),
('user3', 'Virginia Wine Festival'),
('user4', 'Beginner Cooking Class'),
('user4', 'Mysterious New Recipes'),
('user4', 'The Art of Cocktails'),
('user4', 'Virginia Wine Festival'),
('user5', 'Arts and Culinary Festival'),
('user5', 'Mysterious New Recipes'),
('user5', 'Sushi 101'),
('user6', 'Mysterious New Recipes'),
('user6', 'The Art of Cocktails'),
('user6', 'Virginia Wine Festival'),
('user7', 'Arts and Culinary Festival'),
('user7', 'Mysterious New Recipes'),
('user8', 'Beginner Cooking Class');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `serving_size` int(11) NOT NULL CHECK (`serving_size` > 0),
  `family_meal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`serving_size`, `family_meal`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`) VALUES
('user1', 'ap4vh1', 'user1@gmail.com'),
('user10', '984wgnR', 'user10@gmail.com'),
('user2', 'neao', 'user2@gmail.com'),
('user3', 'fneuqR4', 'user3@gmail.com'),
('user4', 'w84nNF', 'user4@gmail.com'),
('user5', '1uoirq$', 'user5@gmail.com'),
('user6', '3sw32b', 'user6@gmail.com'),
('user7', '4frewri', 'user7@gmail.com'),
('user8', 'hy7yng', 'user8@gmail.com'),
('user9', '12we585ng', 'user9@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_name`);

--
-- Indexes for table `has_favorite`
--
ALTER TABLE `has_favorite`
  ADD PRIMARY KEY (`username`,`food_name`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`venue`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`url`);

--
-- Indexes for table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`url`,`ingredient_name`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`username`,`url`);

--
-- Indexes for table `rsvp`
--
ALTER TABLE `rsvp`
  ADD PRIMARY KEY (`username`,`title`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`serving_size`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
