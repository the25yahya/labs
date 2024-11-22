CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    type VARCHAR(50),
    imageLink VARCHAR(255)
);

INSERT INTO products (name, price, description, type, imageLink)
VALUES
('Laptop', 999.99, 'High-performance laptop with 16GB RAM and 512GB SSD', 'Electronics', 'https://gfx3.senetic.com/akeneo-catalog/7/3/6/0/73600dc496b70a8c905b04c48eff21609c6de6c2_1626663_5B2_00043_image1.jpg '),
('Coffee Mug', 12.49, 'Ceramic coffee mug with sleek design', 'Kitchenware', 'https://rukminim2.flixcart.com/image/850/1000/xif0q/mug/h/p/p/valentine-s-special-romantic-gift-stylish-coffee-mug-for-your-original-imagmbf2ejzth7hq.jpeg?q=90&crop=false'),
('Notebook', 5.99, '100-page ruled notebook for school or office use', 'Stationery', 'https://fournishop.ma/40140-large_default/notebook-a6-inner-mind-maroc.jpg'),
('Smartphone', 699.99, 'Latest smartphone with advanced camera features', 'Electronics', 'https://mac-center.com.pr/cdn/shop/files/iPhone_14_Midnight_PDP_Image_Spring23_Position-1A__en-US_00e16ef0-fcdd-4ec6-896a-f71599f35034.jpg?v=1705685022&width=1445'),
('Desk Chair', 129.99, 'Ergonomic office chair with lumbar support', 'Furniture', 'https://i5.walmartimages.com/seo/YangMing-Ergonomic-Mesh-Office-Chair-Executive-Rolling-Swivel-Chair-Computer-Chair-with-Lumbar-Support-Desk-Task-Chair-for-Women-Men-Pink_672974f8-8748-4beb-8189-d6f620a43114.fae72d2d901ef5ba19fa6a840b80701a.jpeg');