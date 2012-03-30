-- Adding category
INSERT INTO `ifoodie`.`category` (categoryName, priority)
VALUES
(
'Starters','1'
);

INSERT INTO `ifoodie`.`category` (categoryName, priority)
VALUES
(
'Salads','2'
);

INSERT INTO `ifoodie`.`category` (categoryId, categoryName, priority)
VALUES
(
'33', 'Main Course','3'
);

INSERT INTO `ifoodie`.`category` (categoryId, categoryName, priority)
VALUES
(
'34', 'Desserts','4'
);


-- Adding itemsDetails
-- Starters
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Zucchini Toast','description for ZT',60,1,10,30,1
);

INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Oats Tikki','description Oats here',50,1,10,40,1
);
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Crispy Chicken','description OCNS here',125,0,20,150,1
);

-- Salads
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Bermuda Spinach Salad','description for BSS',50,1,10,60,2
);

INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Macaroni Salad','description MS here',80,1,10,80,2
);
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Oriental Cold Noodle Salad','description OCNS here',75,1,10,50,2
);

-- Main Course
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Mutter Paneer','description for mutter paneer here',40,1,10,60,3
);

INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Mutton Kadai','description mutton kadai here',120,0,15,180,3
);
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Hyderabadi Kheema','description hyderabadi kheema here',135,0,15,150,3
);

-- Deserts
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Ice Cream - Vanilla','Vanilla flavoured ice cream',50,1,5,70,4
);

INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Caramel Custard','Fruit custard',80,1,5,100,4
);
INSERT INTO `ifoodie`.`itemdetails`
(
`name`,`description`,`cost`,`veg`,`cookingTime`,`calorieCount`,`categoryId`
)
VALUES
(
'Triffle Pudding','Sweet pudding',75,1,5,120,4
);
 

 
-- Adding users
INSERT INTO `ifoodie`.`users`
(
`uname`,`password`,`fName`,`lName`,`role`
)
VALUES
(
'stevej','123','Steve','Jobs','Admin'
);

INSERT INTO `ifoodie`.`users`
(
`uname`,`password`,`fName`,`lName`,`role`
)
VALUES
(
'jominj','123','Jomin','Joseph','User'
);


-- Adding order
INSERT INTO `ifoodie`.`order`
(
`date`,`paymentMethod`,`discount`,`totalCost`
)
VALUES
(
'2012-02-21','CASH',0,0
);


-- Adding itemorder
INSERT INTO `ifoodie`.`itemorder` 
(
itemId, orderId, quantity, cost
)
VALUES
(
3,1, 2,250
);


-- Adding queue
INSERT INTO `ifoodie`.`queue`
(
`itemOrderId`,
`eta`
)
VALUES
(
1,30
);
