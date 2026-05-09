<div align="center">

# LeadGenify Pro

**A self-hosted, multi-SMTP bulk email marketing platform built with Laravel.**

[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-CDN_JIT-38BDF8?style=flat-square&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/license-MIT-22C55E?style=flat-square)](LICENSE)
[![Version](https://img.shields.io/badge/version-v2.0.0-6366F1?style=flat-square)](https://github.com/cindybramlet-cmd/LeadGenifyPro/releases)

</div>

---

## 📖 Overview

**LeadGenify Pro** is a production-ready, self-hosted email marketing platform. Send bulk campaigns through any SMTP server you own — no dependency on Mailchimp, SendGrid, or SES. You control every byte of your data and deliverability infrastructure.

Built for marketers, developers, and agencies who need a reliable, white-label bulk email solution with professional UI and enterprise-grade features including A/B testing, drip automation, bounce handling, role-based access control, and full multi-account isolation.

---

## ✨ Feature Highlights

### 📧 Campaigns
| Feature | Description |
|---------|-------------|
| **Rich-Text + HTML Editor** | Quill.js WYSIWYG editor with live sync to raw HTML mode |
| **File Attachments** | Attach up to 10 MB files per campaign |
| **Email Warm-up** | Built-in gradual volume ramp-up to protect sender reputation |
| **Rate Throttling** | Per-campaign emails-per-minute control |
| **Scheduled Send** | Set any future date/time for automatic delivery |
| **Campaign Duplicate** | Clone any existing campaign in one click |
| **Resend Completed** | Re-dispatch a finished campaign instantly |
| **A/B Testing** | 50/50 split — two subjects, two bodies, independent open tracking |
| **Merge Tags** | Personalise with `{{first_name}}`, `{{last_name}}`, `{{email}}` |
| **Live Stats Polling** | Real-time queued / sent / opened / failed counters without page reload |
| **Test Email** | Send a test copy before launching |

### 👥 Audience Management
| Feature | Description |
|---------|-------------|
| **Contact CRUD** | Full create, read, update, delete on individual contacts |
| **Contact Tags** | Assign and filter contacts by custom tags |
| **Open Rate per Contact** | See engagement history at the individual contact level |
| **Groups / Lists** | Organise contacts into named lists; campaigns target one or more groups |
| **Bulk Group Assign** | Assign hundreds of contacts to a group in one action |
| **Bulk Delete** | Remove contacts in bulk with safety confirmation |
| **CSV Import** | Flexible column mapping with per-row validation feedback |
| **CSV Export** | Download your full audience as a CSV file |

### 📬 SMTP / Sending Infrastructure
| Feature | Description |
|---------|-------------|
| **Multiple SMTP Servers** | Configure unlimited SMTP accounts |
| **Provider Presets** | One-click fill for Gmail, Outlook, Zoho, Brevo, and more |
| **Encrypted Passwords** | SMTP credentials stored with Laravel's `encrypt()` / `decrypt()` |
| **Activate / Deactivate** | Toggle servers on/off without deleting them |
| **Connection Test** | Test SMTP connectivity from the UI |
| **Send Test Email** | Fire a real message through any specific SMTP server |
| **Daily Send Limit** | Per-server quota to prevent over-sending |
| **Priority Routing** | Assign priority to control which server the queue worker prefers |
| **CSV Bulk Upload** | Import dozens of SMTP servers via CSV |
| **SMTP Health Dashboard** | View send counts, success rates, and last-used timestamps per server |

### 💧 Drip Campaigns (Automation)
| Feature | Description |
|---------|-------------|
| **Multi-step sequences** | Build automated email flows with unlimited steps |
| **Delay between steps** | Set custom day/hour intervals between each step |
| **Audience enrollment** | Enroll individual contacts or entire groups |
| **Per-step tracking** | Sent / opened / failed stats for every drip step |
| **Pause & resume** | Full lifecycle control over drip sequences |

### 📋 Email Templates Library
| Feature | Description |
|---------|-------------|
| **Template CRUD** | Create, edit, delete reusable email templates |
| **Category Tags** | Organise templates by category with tab-filter UI |
| **One-click Load** | Load any template into the campaign editor with subject pre-fill |
| **"Use in Campaign" shortcut** | Jump directly from a template to the campaign builder |

### 📊 Dashboard & Reporting
| Feature | Description |
|---------|-------------|
| **Account-scoped dashboard** | Stat cards: campaigns, contacts, sent, opened, failed, open rate |
| **5 Chart.js charts** | Bar (campaigns over time), doughnut (delivery breakdown), plus 3 additional charts |
| **Campaign report** | Per-campaign stats table with badge-coded status |
| **Single email report** | Full delivery history for individually sent emails |
| **Failed email panel** | Quick view of recent failures with error messages |

### 📣 Single Email Send
- Send a one-off email to any address directly from the UI
- Full tracking (open + click) and unsubscribe footer

### ⚠️ Bounce Handling
| Feature | Description |
|---------|-------------|
| **SES Webhook** | Receive and process bounce events from Amazon SES SNS |
| **Manual Mark / Clear** | Flag contacts as bounced or clear bounce status by hand |
| **Worker Skip** | Bounced contacts are automatically skipped in future sends |
| **Bounce Log** | Dedicated bounce management page |

### 🔓 Compliance & Deliverability
| Feature | Description |
|---------|-------------|
| **Branded Unsubscribe Footer** | Auto-injected footer with app name, copyright, and unsubscribe link |
| **List-Unsubscribe Headers** | RFC-compliant headers for Gmail / Outlook native unsubscribe button |
| **Unsubscribe Landing Page** | Clean, self-contained confirmation page |
| **Suppression List** | Unsubscribed emails permanently excluded from future sends |
| **Custom Unsubscribe Branding** | Upload your own logo and custom message for the unsubscribe page |

### 👤 Multi-Account & Role-Based Access Control
| Feature | Description |
|---------|-------------|
| **Account Isolation** | All data scoped per account — zero leakage between tenants |
| **3-tier RBAC** | **Admin** (full access), **Manager** (campaigns + SMTP + settings), **Operator** (read + send only) |
| **User Management** | Admins create, edit, and manage users within their account |
| **Webhook per account** | Each account can configure its own event webhook URL |

### 🔒 Security
| Feature | Description |
|---------|-------------|
| **Rate Limiting** | Campaign actions 10 req/min; single email 20 req/min; SMTP test 10 req/min |
| **CSRF Protection** | All mutating forms include `@csrf` |
| **Input Validation** | Server-side validation on all submissions with user-friendly messages |
| **Encrypted SMTP Passwords** | Passwords never stored in plaintext |

### 🎨 UI / UX
| Feature | Description |
|---------|-------------|
| **7 Built-in Themes** | Light, Dark, Pro Teal, Midnight Navy, Deep Emerald, Royal Purple, Charcoal |
| **Dark Mode** | Full Tailwind `dark:` class support across all views |
| **Collapsible Sidebar** | Desktop sidebar collapse + mobile drawer |
| **Toast Notifications** | Flash messages after every action |
| **Responsive Design** | Works on mobile, tablet, and desktop |
| **Role Badges** | Users see their role in the sidebar footer |

---

## 💡 Unique Selling Points (USP)

| # | USP | Why it matters |
|---|-----|----------------|
| 1 | **Zero third-party email dependency** | Send through any SMTP you own — no Mailchimp or SendGrid lock-in. Your data stays yours. |
| 2 | **Per-row CSV import errors** | Every skipped row shows the exact reason (invalid email, duplicate, already exists). Fix your data confidently. |
| 3 | **Multi-SMTP priority routing & failover** | Configure many SMTP servers with priorities. The queue worker auto-picks the best active server. |
| 4 | **Built-in A/B Testing** | Create two variants per campaign, split 50/50, and track which performs better — no add-ons needed. |
| 5 | **Drip Campaign Automation** | Build multi-step email sequences with custom delays and enroll contacts or entire groups. |
| 6 | **SMTP Health Dashboard** | See per-server send rates, success/failure breakdowns, and quota usage in one view. |
| 7 | **3-tier RBAC** | Admin / Manager / Operator roles with fine-grained sidebar and route access control. |
| 8 | **Full account isolation** | Run a true multi-tenant SaaS — every resource is scoped to an `account_id`. |
| 9 | **Professional compliance out of the box** | RFC `List-Unsubscribe` headers, branded footer, suppression list, and custom unsubscribe branding. |
| 10 | **7 colour themes with live switching** | Light to deep-dark themes persisted per-browser — every user personalises their UI. |

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 12 · PHP 8.2+ |
| Frontend CSS | Tailwind CSS (CDN JIT) |
| Rich text editor | Quill.js 2.0 |
| Charts | Chart.js |
| Database | MySQL / SQLite (Eloquent ORM) |
| Queue | Laravel Queue (database driver) |
| Process manager | Supervisor |
| Authentication | Laravel Breeze |
| Email transport | Symfony Mailer |

---

## 🚀 Quick Start

### Requirements

- PHP **8.2+** with extensions: `mbstring`, `openssl`, `pdo`, `tokenizer`, `xml`, `ctype`, `json`
- Composer 2.x
- Node.js 18+ & npm (optional — CDN assets are used by default)
- MySQL 8+ **or** SQLite 3

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/cindybramlet-cmd/LeadGenifyPro.git
cd LeadGenifyPro

# 2. Install PHP dependencies
composer install

# 3. Copy environment file and generate key
cp .env.example .env
php artisan key:generate

# 4. Configure your database in .env
# For SQLite (easiest):
# DB_CONNECTION=sqlite
#
# For MySQL:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_DATABASE=leadgenify
# DB_USERNAME=root
# DB_PASSWORD=yourpassword

# 5. Run migrations
php artisan migrate

# 6. Create your first admin user
php artisan tinker
# >>> \App\Models\User::create(['name'=>'Admin','email'=>'admin@example.com','password'=>bcrypt('password'),'role'=>'admin']);

# 7. Start the development server
php artisan serve
```

Open **http://127.0.0.1:8000** and log in.

### Queue Worker (required for sending emails)

```bash
# Development
php artisan queue:work

# Production (using included supervisor.conf)
sudo cp supervisor.conf /etc/supervisor/conf.d/leadgenify-worker.conf
sudo supervisorctl reread && sudo supervisorctl update
sudo supervisorctl start leadgenify-worker:*
```

---

## ⚙️ Configuration

### `.env` key settings

```dotenv
APP_NAME="LeadGenify Pro"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=leadgenify
DB_USERNAME=dbuser
DB_PASSWORD=dbpassword

QUEUE_CONNECTION=database
SESSION_DRIVER=database
LOG_LEVEL=error
```

### SMTP Servers

SMTP credentials are configured **inside the application** (Settings → SMTP / Sending), not in `.env`. This allows multiple SMTP accounts with per-account priority routing. Passwords are stored encrypted using Laravel's `encrypt()`.

---

## 📂 Project Structure

```
LeadGenifyPro/
├── app/
│   ├── Http/Controllers/         # Campaign, Contact, SMTP, Template, Drip, Bounce, Users...
│   ├── Jobs/                     # ProcessCampaignQueueJob, ProcessDripsCommand
│   ├── Mail/                     # CampaignMail, DripMail, SingleEmailMail
│   ├── Models/                   # Campaign, Contact, Group, SmtpServer, DripCampaign, EmailTemplate...
│   ├── Console/Commands/         # DispatchScheduledCampaigns, ProcessDrips, WorkMailsQueue
│   └── Support/TracksEmailContent.php   # Unsubscribe footer + click/open tracking trait
├── database/migrations/          # 40+ schema migrations
├── resources/views/
│   ├── campaigns/                # Create, edit, index, A/B test
│   ├── contacts/                 # CRUD + tags
│   ├── drip/                     # Create, edit, index, show (step management)
│   ├── groups/
│   ├── smtp/                     # SMTP management + health dashboard
│   ├── templates/                # Email templates CRUD
│   ├── bounces/                  # Bounce log
│   ├── suppression/              # Suppression list
│   ├── users/                    # User management (admin only)
│   ├── import/                   # CSV import + result
│   ├── reports/                  # Campaign & single email reports
│   ├── settings/                 # App settings + branding + webhook
│   ├── layouts/app.blade.php     # Main SaaS layout (7 themes)
│   └── components/               # Sidebar, navbar, stat-card
├── routes/web.php
├── supervisor.conf               # Production queue worker config
├── FEATURES.md                   # Full feature & USP documentation
└── README.md                     # This file
```

---

## 📦 Version History

| Version | Highlights |
|---------|-----------|
| v1.0.0 | Initial release — core campaign & contact management |
| v1.1.0 | LeadGenify Pro rebrand, SMTP encryption, Quill editor sync fixes |
| v1.2.0 | Security hardening, rate limiting, Supervisor config |
| v1.3.0 | Rich account-scoped dashboard with Chart.js |
| v1.4.0 | Branded unsubscribe footer & List-Unsubscribe headers |
| v1.5.0 | Email Templates Library with campaign integration |
| v1.6.0 | Code refactoring — centralised account ID, real error messages |
| v1.7.0 | Per-row CSV import validation feedback |
| v1.8.0 | 7 themes, LeadGenify Pro logo/favicon, table layouts, Load Template fix |
| v1.9.0 | Bounce handling — SES webhook, manual mark/clear, worker skip |
| v1.10.0 | A/B Testing — 50/50 split, variant B editor, independent open tracking |
| v1.11.0 | Drip Campaigns — automated multi-step email sequences |
| v1.12.0 | Scheduled auto-send, campaign duplicate, contact CSV export |
| v1.13.0 | Suppression list, SMTP health dashboard, webhooks & unsubscribe branding |
| v1.14.0 | Role-based access control (Admin / Manager / Operator) |
| **v2.0.0** | **Contact tags, open rate per contact, 5 dashboard charts, migration stability, production hardening** |

---

## 🗺️ Roadmap

- [ ] REST API for external integrations
- [ ] Email preview across popular clients (Litmus-style)
- [ ] Advanced segmentation (filter by tag, open rate, last activity)
- [ ] Stripe billing integration for SaaS monetization
- [ ] Custom domain tracking (click/open pixel on your own domain)

---

## 🤝 Contributing

Contributions, issues and feature requests are welcome!

1. Fork the project
2. Create your feature branch: `git checkout -b feat/amazing-feature`
3. Commit your changes: `git commit -m 'feat: add amazing feature'`
4. Push to the branch: `git push origin feat/amazing-feature`
5. Open a Pull Request

---

## 📄 License

This project is licensed under the **MIT License** — see the [LICENSE](LICENSE) file for details.

---

<div align="center">

**Built with ❤️ by [LeadGenify Pro](https://github.com/cindybramlet-cmd/LeadGenifyPro)**

⭐ Star this repo if you find it useful!

</div>
