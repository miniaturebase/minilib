.DEFAULT_GOAL := help
.PHONY: $(filter-out vendor, $(MAKECMDGOALS))

analysis: ## Analyze the source code and manifest document(s)
	@composer validate
	@composer normalize --dry-run
	@composer style -- --dry-run
	@composer analyze

help: ## Show this help message
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
