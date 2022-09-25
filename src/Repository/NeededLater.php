<?php

// Запросы с помощью SQL¶

// В дополнение, если необходимо, вы можете писать запросы напрямую с SQL:

// // src/Repository/ProductRepository.php

// // ...
// class ProductRepository extends ServiceEntityRepository
// {
//     public function findAllGreaterThanPrice(int $price): array
//     {
//         $conn = $this->getEntityManager()->getConnection();

//         $sql = '
//             SELECT * FROM product p
//             WHERE p.price > :price
//             ORDER BY p.price ASC
//             ';
//         $stmt = $conn->prepare($sql);
//         $stmt->execute(['price' => $price]);

//         // возвращает массив массивов (т.e. сырой набор данных)
//         return $stmt->fetchAllAssociative();
//     }
// }

