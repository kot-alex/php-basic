<?php

function getReviewMessage($action)
{
    $messages =  [
        '' => '',
        'add' => 'Review has been added.',
        'delete' => 'Review has been deleted.',
        'save' => 'Review has been modified.',
        'error' => 'Error.',
    ];
    return $messages[$action];
}

function productExists($id)
{
    $query = getAssocResult("SELECT id FROM `catalog` WHERE id = $id");
    return ($query->num_rows != 0) ? '' : 'Product not found';
}

function getProduct($id)
{
    return getOneResult("SELECT * FROM `catalog` WHERE id = $id");
}

function getAllFeedbacks()
{
    return getAssocResult("SELECT * FROM feedbacks ORDER by id DESC");
}

function addFeedback()
{
    $author = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_POST['author'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_POST['feedback'])));
    executeSql("INSERT INTO feedbacks (author, feedback) VALUES ('$author', '$feedback')");
}

function editFeedback()
{
    $id = (int)$_POST['feedId'];
    $result = mysqli_query(linkDb(), "SELECT * FROM `feedbacks` WHERE id= $id");
    if ($result) $row = mysqli_fetch_assoc($result);
    return $row;
}

function saveFeedback()
{
    $id = (int)$_POST['feedId'];
    $author = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_POST['author'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $_POST['feedback'])));
    executeSql("UPDATE feedbacks SET author='$author', feedback='$feedback' WHERE id=$id");
}

function deleteFeedback()
{
    $id = (int)$_POST['feedId'];
    executeSql("DELETE FROM feedbacks WHERE id=$id");
}

function doFeedbackAction($action, $prodId)
{
    $data = [];
    switch ($action) {
        case 'add';
            addFeedback();
            $status = 'add';
            header('Location:' . '/product/?id=' . $prodId . '&status=' . $status);
            die();

        case 'edit';
            $data['row'] = editFeedback();
            $data['action'] = 'save';
            $data['buttonText'] = 'Modify';
            return $data;

        case 'save';
            saveFeedback();
            $status = 'save';
            header('Location:' . '/product/?id=' . $prodId . '&status=' . $status);
            die();

        case 'delete';
            deleteFeedback();
            $status = 'delete';
            header('Location:' . '/product/?id=' . $prodId . '&status=' . $status);
            die();
    }
}
