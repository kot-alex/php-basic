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

function getAllFeedbacks()
{
    return getAssocResult("SELECT * FROM feedbacks ORDER by id DESC");
}

function addFeedback($author, $feedback)
{
    $author = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $author)));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $feedback)));
    executeSql("INSERT INTO feedbacks (author, feedback) VALUES ('$author', '$feedback')");
}

function editFeedback($id)
{
    $row = getOneResult("SELECT * FROM `feedbacks` WHERE id='$id'");
    return $row;
}

function saveFeedback($id, $author, $feedback)
{
    $author = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $author)));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string(linkDb(), $feedback)));
    executeSql("UPDATE feedbacks SET author='$author', feedback='$feedback' WHERE id='$id'");
}

function deleteFeedback($id)
{
    executeSql("DELETE FROM feedbacks WHERE id='$id'");
}

function doFeedbackAction($action, $id, $author, $feedback)
{
    $id = (int)$id;
    $data = [];
    switch ($action) {
        case 'add';
            addFeedback($author, $feedback);
            break;

        case 'edit';
            $data['row'] = editFeedback($id);
            $data['action'] = 'save';
            $data['buttonText'] = 'Modify';
            return $data;

        case 'save';
            saveFeedback($id, $author, $feedback);
            break;

        case 'delete';
            deleteFeedback($id);
            break;
    }
    header('Location:' . '/feedbacks/?status=' . $action);
    die();
}
