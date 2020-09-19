<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index()
    {
        return $this->render(
            'Index/index.html.twig',
            [
                'users' => $this->generateUsers(15)
            ]
        );
    }

    public function edit($id)
    {
        $users = $this->generateUsers(15);
        if (empty($users[$id])) {
            throw $this->createNotFoundException();
        }
        return $this->render(
            'Index/edit.html.twig',
            [
                'user' => $users[$id]
            ]
        );
    }

    private function generateUsers($number)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $users = [];
        for ($i = 0; $i < $number; $i++) {
            $firstName = $faker->firstName;
            $lastName  = $faker->lastName;
            $users[]   = [
                'firstName' => $firstName,
                'lastName'  => $lastName,
                'initials' => sprintf('%s%s', $firstName[0], $lastName[0]),
                'email'     => $faker->safeEmail,
                'activated' => $faker->boolean(40),
            ];
        }

        return $users;
    }
}
