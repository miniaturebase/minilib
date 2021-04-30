.DEFAULT_GOAL := help
.PHONY: $(filter-out vendor, $(MAKECMDGOALS))

analysis: ## Analyze the source code and manifest document(s)
	@composer validate
	@composer normalize --dry-run
	@composer style -- --dry-run
	@composer analyze

help: ## Show this help message
	@printf "\n" && printf "G1sxbSAbWzBtG1sxbV8bWzBtG1sxbSAbWzBtG1sxbV8bWzBtG1sxbSAbWzBtG1sxbV8bWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtG1sxbSAbWzBtChtbMW0nG1swbRtbMW0gG1swbRtbMW0pG1swbRtbMW0gG1swbRtbMW0pG1swbRtbMW0gG1swbRtbMW0pG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0vG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbQobWzFtIBtbMG0bWzFtLxtbMG0bWzFtIBtbMG0bWzFtLxtbMG0bWzFtIBtbMG0bWzFtLxtbMG0bWzFtIBtbMG0bWzFtIBtbMG0bWzFtbxtbMG0bWzFtIBtbMG0bWzFtXxtbMG0bWzFtXxtbMG0bWzFtXxtbMG0bWzFtXxtbMG0bWzFtIBtbMG0bWzFtIBtbMG0bWzFtbxtbMG0bWzFtIBtbMG0bWzFtLxtbMG0bWzFtXxtbMG0bWzFtXxtbMG0bWzFtIBtbMG0bWzFtXxtbMG0bWzFtXxtbMG0bWzFtLhtbMG0bWzFtIBtbMG0bWzFtIBtbMG0bWzFtXxtbMG0bWzFtIBtbMG0bWzFtIBtbMG0bWzFtIBtbMG0bWzFtXxtbMG0bWzFtIBtbMG0KG1sxbS8bWzBtG1sxbSAbWzBtG1sxbScbWzBtG1sxbSAbWzBtG1sxbSgbWzBtG1sxbV8bWzBtG1sxbSAbWzBtG1sxbTwbWzBtG1sxbV8bWzBtG1sxbS8bWzBtG1sxbSAbWzBtG1sxbS8bWzBtG1sxbSAbWzBtG1sxbTwbWzBtG1sxbV8bWzBtG1sxbTwbWzBtG1sxbV8bWzBtG1sxbS8bWzBtG1sxbV8bWzBtG1sxbSkbWzBtG1sxbSAbWzBtG1sxbSgbWzBtG1sxbV8bWzBtG1sxbS8bWzBtG1sxbXwbWzBtG1sxbV8bWzBtG1sxbS8bWzBtG1sxbV8bWzBtG1sxbSkbWzBtG1sxbV8bWzBtG1sxbTwbWzBtG1sxbS8bWzBtG1sxbV8bWzBtChtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbRtbMW0gG1swbQ==" | base64 -d && printf "\n\n"
	@printf "\033[33mUsage:\033[0m\n  make [target] [arg=\"val\"...]\n\n\033[33mTargets:\033[0m\n"
	@grep -E '^[-a-zA-Z0-9_\.\/]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[32m%-15s\033[0m %s\n", $$1, $$2}'

repl: ## Start a REPL instance and interact with the library
	@php -f bin/play

fmt: ## Format the source code and other documents in the repository
	@composer normalize
	@composer style

test: ## Run tests
	@composer test

vendor: composer.json $(wildcard composer.lock) ## Install vendor dependencies
	@composer install --optimize-autoloader
