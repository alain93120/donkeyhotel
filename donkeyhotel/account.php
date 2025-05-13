<?php
// require_once './config/db.php';
// require_once './modeles/User.php';
// require_once './controlleur/HomeController.php';
// require_once './controlleur/AccountController.php';

// $action = $_GET['action'] ?? 'account';
// $controller = new HomeController();

// switch ($action) {
//     case 'account':
//         $accountController = new AccountController(pdo:);
//         $subAction = $_GET['sub'] ?? 'show';

//         switch ($subAction) {
//             case 'update':
//                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                     $accountController->updateAccount(
//                         $_POST['id'],
//                         $_POST['firstname'],
//                         $_POST['lastname'],
//                         $_POST['email'],
//                         $_POST['phone'],
//                         $_POST['civility']
//                     );
//                     header('Location: ?action=account&sub=show&id=' . $_POST['id']);
//                     exit();
//                 }
//                 break;

//             case 'show':
//                 $id = $_GET['id'] ?? null;
//                 $accountController->getAccountInfo($id);
//                 break;

//             case 'delete':
//                 $id = $_GET['id'] ?? null;
//                 $accountController->deleteAccount($id);
//                 header('Location: index.php?action=logout');
//                 exit();

//             case 'newpass':
//                 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                     $id = $_POST['id'] ?? null;
//                     $newPass = $_POST['new_password'] ?? null;
//                     $accountController->changePassword($id, $newPass);
//                     header('Location: ?action=account&sub=show&id=' . $id);
//                     exit();
//                 }
//                 break;

//             default:
//                 echo "Sous-action account inconnue.";
//         }
//         break;

//     default:
//         echo "Page introuvable.";
// }
