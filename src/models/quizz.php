<?php

/**
 * Question DTO
 */
class Question
{
	public function __construct(
		string $question,
		string $correctAwnser,
		array $wrongAwnsers
	) {
		$this->question = $question;
		$this->correctAwnser = $correctAwnser;
		$this->wrongAwnsers = $wrongAwnsers;
	}

	private string $question;
	private string $correctAwnser;
	private array $wrongAwnsers; // array of string

	public function getQuestion(): string
	{
		return $this->question;
	}

	public function getCorrectAwnser(): string
	{
		return $this->correctAwnser;
	}

	public function getWrongAwnsers(): array
	{
		return $this->wrongAwnsers;
	}
}

/**
 * Quizz DTO
 */
class Quizz
{

	public function __construct(
		string $title,
		string $pseudo,
		int $nbParties,
		array $questions,
	) {
		$this->title = $title;
		$this->pseudo = $pseudo;
		$this->nbParties = $nbParties;
		$this->questions = $questions;
	}

	private string $title;
	private string $pseudo;
	private int $nbParties;
	private array $questions; // array of Question*

	public function getTitle(): string
	{
		return $this->title;
	}

	public function getPseudo(): string
	{
		return $this->pseudo;
	}

	public function getNbParties(): int
	{
		return $this->nbParties;
	}

	public function getQuestions(): array
	{
		return $this->questions;
	}
}
