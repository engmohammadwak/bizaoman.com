# This file is intentionally left empty.
# The correct file is run.py
# Please delete ruun.py from your local machine after pulling.
import subprocess
from colorama import Fore, init
from datetime import datetime

init(autoreset=True)

# ==================================
# Git Settings
# ==================================

REPO_URL = "https://github.com/engmohammadwak/bizaoman.com.git"
BRANCH = "laravel-conversion"

# ==================================
# Commands
# ==================================

COMMANDS = {
    "1": {
        "title": "\U0001f4e4 Uploading...",
        "commands": [
            "git status",
            "git add .",
            f'git commit -m "Project Update - {datetime.now().strftime("%d/%m/%Y - %I:%M %p")}"',
            f"git push origin HEAD:{BRANCH}",   # ✅ NO --force
        ],
    },
    "2": {
        "title": "\U0001f4e5 Downloading...",
        "commands": [
            f"git remote set-url origin {REPO_URL}",
            f"git pull origin {BRANCH}",
            "php artisan migrate --force",
            "php artisan optimize:clear",
            "php artisan view:clear",
            "php artisan cache:clear",
            "php artisan serve",
        ],
    },
    "3": {
        "title": "\U0001f4a3 Reset Git & Upload...",
        "commands": [
            "rmdir /s /q .git",
            "git init",
            "git add .",
            'git commit -m "Initial upload"',
            f"git branch -M {BRANCH}",
            f"git remote add origin {REPO_URL}",
            f"git push -u origin {BRANCH} --force",
        ],
    },
}


def run_command(cmd):
    if cmd.startswith("git "):
        cmd = cmd.replace("git ", "git -c color.ui=always ", 1)

    print(Fore.YELLOW + f"\n\u25b6 {cmd}")
    result = subprocess.run(cmd, shell=True)

    if result.returncode == 0:
        print(Fore.GREEN + "\u2705 Success")
        return True

    print(Fore.RED + "\u274c Failed")
    return False


def run_commands(commands):
    for cmd in commands:
        if not run_command(cmd):
            return
    print(Fore.GREEN + "\n\U0001f389 All operations completed successfully!")


def show_menu():
    print(Fore.CYAN  + "=" * 45)
    print(Fore.YELLOW + "\U0001f680 Git Manager")
    print(Fore.CYAN  + "=" * 45)
    print(Fore.GREEN + "1\ufe0f\u20e3 Upload to GitHub (safe push)")
    print(Fore.BLUE  + "2\ufe0f\u20e3 Download from GitHub")
    print(Fore.RED   + "3\ufe0f\u20e3 \u26a0\ufe0f  DANGER: Reset Git & Force Upload")
    print(Fore.CYAN  + "=" * 45)
    return input(Fore.MAGENTA + "\U0001f449 Choose (1/2/3): ").strip()


def confirm_reset():
    """
    Triple-confirm before the destructive option 3.
    Requires the user to type the word RESET exactly.
    """
    print(Fore.RED + "\n" + "!" * 45)
    print(Fore.RED + "\u26a0\ufe0f  WARNING: This will PERMANENTLY DELETE your entire")
    print(Fore.RED + "   git history and force-push to GitHub.")
    print(Fore.RED + "   This action CANNOT be undone.")
    print(Fore.RED + "!" * 45)

    step1 = input(Fore.RED + "\nDo you understand this is destructive? (yes/no): ").strip().lower()
    if step1 != "yes":
        return False

    step2 = input(Fore.RED + "Are you sure you want to delete all git history? (yes/no): ").strip().lower()
    if step2 != "yes":
        return False

    step3 = input(Fore.RED + 'Type  RESET  to confirm: ').strip()
    return step3 == "RESET"


def main():
    choice = show_menu()

    if choice not in COMMANDS:
        print(Fore.RED + "\u274c Invalid choice")
        return

    if choice == "3" and not confirm_reset():
        print(Fore.YELLOW + "\u274c Cancelled — no changes made.")
        return

    print(Fore.CYAN + f"\n{COMMANDS[choice]['title']}\n")
    run_commands(COMMANDS[choice]["commands"])


if __name__ == "__main__":
    main()
