# LeadGenify Pro — Complete Feature Reference
## Version 2.0.0

---

## 🚀 Core Features

### 📧 Email Campaigns
- **Full campaign lifecycle** — Create, edit, schedule, pause, resume, duplicate, resend, and delete campaigns
- **Rich text editor (Quill.js)** — WYSIWYG editor with font, colour, alignment, lists, links, images, and code-block support
- **Raw HTML editor** — Switch between rich-text and raw HTML with live sync
- **File attachments** — Attach files up to 10 MB per campaign
- **Email warm-up** — Built-in warm-up schedule to gradually increase sending volume and protect deliverability
- **Emails-per-minute throttling** — Fine-grained rate control to stay within SMTP limits
- **Scheduled campaigns** — Set a future date/time for automatic delivery (auto-dispatched by queue worker)
- **Campaign duplicate** — Clone any campaign in one click, including body and settings
- **Resend completed campaign** — Re-dispatch a finished campaign without rebuilding from scratch
- **Merge tags** — Personalise emails with `{{first_name}}`, `{{last_name}}`, `{{email}}` (auto-replaced at send time)
- **Test email** — Send a test copy before launch
- **Live stats dashboard** — Real-time counters (queued / sent / opened / failed) polled without page reload
- **Per-campaign delivery log** — Scrollable list of recent deliveries with status and timestamps

### 🧪 A/B Testing
- **50/50 audience split** — Half your contacts receive variant A, half receive variant B
- **Independent editors** — Separate subject line and body for each variant
- **Per-variant tracking** — Opened and failed counts tracked independently per variant
- **Campaign-level reporting** — Side-by-side comparison of A vs B performance
- **No external tools** — Entire A/B workflow is built into the campaign editor

### 👥 Audience Management
- **Contacts** — Full CRUD (Create, Read, Update, Delete) on individual contacts
- **Contact fields** — Email, first name, last name, business name, website
- **Contact tags** — Assign and filter contacts by custom colour-coded tags
- **Open rate per contact** — Track individual engagement history directly on the Audience page
- **Groups / Lists** — Organise contacts into groups; campaigns target one or more groups
- **Bulk group assignment** — Assign hundreds of contacts to a group in one action
- **Bulk delete** — Remove contacts in bulk with safety confirmation
- **CSV import** — Import contacts from a CSV file with flexible column mapping:
  - Single "name" column *or* separate first/last name columns
  - Optional business name, website, and group assignment
  - **Per-row validation feedback** — every skipped row shows the exact reason (invalid email, duplicate, already exists)
- **CSV export** — Download your full contact list as a CSV file

### 📬 SMTP / Sending Infrastructure
- **Multiple SMTP servers** — Configure unlimited SMTP accounts (Gmail, Outlook, Zoho, Brevo, or custom)
- **Provider presets** — One-click fill of host/port/encryption for popular providers
- **Encrypted passwords** — SMTP passwords stored with Laravel's `encrypt()` / `decrypt()`
- **Activate / Deactivate** — Toggle individual SMTP servers on/off without deleting them
- **Connection test** — Test SMTP connectivity directly from the UI
- **Send test email** — Fire a real test message through a specific SMTP server
- **Daily send limit** — Per-server daily limit to avoid quota overruns
- **Priority routing** — Assign a priority to control which server the queue worker prefers (auto-failover)
- **CSV bulk upload** — Add dozens of SMTP servers in one CSV upload with per-row error reporting
- **SMTP Health Dashboard** — View per-server send counts, success rates, quota usage, and last-used timestamps

### 💧 Drip Campaigns (Automation)
- **Multi-step sequences** — Build automated email flows with unlimited steps per drip campaign
- **Custom delays** — Set day/hour intervals between each step independently
- **Enrollment** — Enroll individual contacts or entire groups into a drip sequence
- **Per-step tracking** — Sent, opened, and failed stats for each step
- **Full lifecycle control** — Create, edit, pause, resume, and delete drip campaigns
- **Dedicated drip worker** — `ProcessDripsCommand` artisan command for queue-based step dispatch

### 📋 Email Templates Library
- **Template CRUD** — Create, edit, delete reusable email templates
- **Category tags** — Organise templates by category with tab-filter UI
- **Rich HTML editor** — Same Quill + raw-HTML editor as campaigns
- **Load template in campaigns** — One-click load of a saved template into the campaign editor (subject pre-fills if empty)
- **"Use in Campaign" shortcut** — Jump directly from a template to the campaign builder

### 📣 Single Email Send
- Send a one-off email to any address directly from the UI
- Full click + open tracking and automatic unsubscribe footer
- Delivery history shown in the Single Email Report

### ⚠️ Bounce Handling
- **SES webhook integration** — Receive and process bounce events from Amazon SES via SNS
- **Manual mark bounced** — Flag any contact as bounced directly from the Bounces page
- **Clear bounce status** — Restore a bounced contact to active with one click
- **Worker skip** — Bounced contacts are automatically skipped in future campaign and drip sends
- **Bounce log** — Dedicated bounce management page with contact details and bounce dates

### 🔓 Compliance & Deliverability
- **Branded unsubscribe footer** — Auto-injected into every campaign email with app name, copyright, and unsubscribe link
- **List-Unsubscribe headers** — `List-Unsubscribe` and `List-Unsubscribe-Post` headers added automatically for Gmail / Outlook native unsubscribe button support
- **Unsubscribe landing page** — Clean, self-contained confirmation page (inline CSS, no CDN dependency)
- **Suppression list** — Unsubscribed emails permanently stored and automatically excluded from all future sends
- **Custom unsubscribe branding** — Upload your own logo URL and set a custom unsubscribe page message from Settings
- **Merge-tag UTM tracking** — Append UTM parameters to all links in campaign emails

### 📊 Dashboard & Reporting
- **Account-scoped dashboard** — Stat cards: total campaigns, total contacts, emails sent, emails opened, failed emails, open rate
- **5 Chart.js charts:**
  - Bar chart — campaigns over time
  - Doughnut chart — sent / opened / failed delivery breakdown
  - 3 additional engagement charts
- **Campaign report** — Per-campaign stats table with badge-coded status
- **Single email report** — Full delivery history for individually sent emails
- **Failed email panel** — Quick view of recent failures with error messages

### 👤 Multi-Account Architecture & RBAC
- **Account isolation** — All data (campaigns, contacts, groups, SMTP servers, templates, drips) is scoped to an `account_id`; users in different accounts never see each other's data
- **Centralised account resolution** — Base controller provides `currentAccountId()` helper with automatic 403 abort on missing context
- **3-tier role-based access control:**
  - **Admin** — Full access to all features including Settings, User Management, and account configuration
  - **Manager** — Can manage campaigns, contacts, SMTP, templates, drips, and reports; cannot manage users or billing
  - **Operator** — Read-only access + ability to send campaigns; cannot create or edit contacts, SMTP, or settings
- **User management** — Admins create, edit, deactivate, and delete users within their account
- **Role badges** — Each user's role is displayed in the sidebar footer

### 🔒 Security & Stability
- **Rate limiting** — Campaign send/pause/resume throttled at 10 req/min; single email at 20 req/min; SMTP test at 10 req/min
- **CSRF protection** — All mutating forms include `@csrf`
- **Input validation** — Server-side validation on all form submissions with user-friendly error messages
- **Queue-based sending** — Emails dispatched via Laravel Queue; UI stays responsive during large campaigns
- **Idempotent migrations** — All column-adding migrations use `hasColumn()` guards for safe re-runs
- **Supervisor configuration** — `supervisor.conf` included for two queue worker processes with auto-restart, max execution time, and correct log paths

### 🎨 UI / UX
- **Professional SaaS layout** — Sticky top navbar, collapsible sidebar, responsive mobile drawer
- **7 built-in themes** — Light, Dark, Pro Teal, Midnight Navy, Deep Emerald, Royal Purple, Charcoal — all persisted in `localStorage`
- **Dark mode** — Full Tailwind `dark:` class support across all views
- **Role badge in sidebar** — Users always see their current role at a glance
- **Toast / flash messages** — Success and error feedback after every action
- **Form processing state** — Submit buttons auto-disable and show "Processing..." on mutation requests
- **Read-only access banner** — Operator-role users see a clear "Read-only access" notice in the sidebar

---

## 💡 Unique Selling Points (USP)

| # | USP | Detail |
|---|-----|--------|
| 1 | **Zero third-party email service dependency** | Send through any SMTP server you own — no Mailchimp, SendGrid, or SES required. You control the infrastructure entirely. |
| 2 | **Per-row CSV import errors** | Most importers silently skip bad rows. LeadGenify Pro shows you a table of every skipped contact with the exact reason (invalid email, duplicate, already exists), so you fix your data confidently. |
| 3 | **Multi-SMTP priority routing & failover** | Configure multiple SMTP accounts with priorities. The queue worker automatically picks the highest-priority active server — built-in failover with zero extra configuration. |
| 4 | **Built-in A/B Testing** | Create two subject/body variants per campaign, split 50/50, and track opens per variant. No external tools or paid add-ons needed. |
| 5 | **Drip Campaign Automation** | Build multi-step automated email sequences with custom delays. Enroll individual contacts or entire groups. Full lifecycle management included. |
| 6 | **SMTP Health Dashboard** | See per-server send volumes, success/failure breakdowns, daily quota usage, and last-used timestamps — all in one view. |
| 7 | **3-tier RBAC without plugins** | Admin / Manager / Operator roles baked in, with sidebar and route access controlled at the controller level. No extra packages needed. |
| 8 | **Full account isolation** | Every resource is scoped to an account. Run a true multi-tenant SaaS with multiple clients without any data leakage. |
| 9 | **Professional compliance out of the box** | RFC-compliant `List-Unsubscribe` headers, branded footer, suppression list, custom unsubscribe page branding, and bounce handling — everything required to stay out of spam folders and honour user preferences. |
| 10 | **7 colour themes with live switching** | Light to deep-dark themes persist per-browser, so every user personalises their experience without any server-side preference storage. |

---

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend framework | Laravel 12 (PHP 8.2+) |
| Frontend CSS | Tailwind CSS (CDN — JIT) |
| Rich text editor | Quill.js 2.0 |
| Charts | Chart.js |
| Database | MySQL / SQLite (via Eloquent ORM) |
| Queue | Laravel Queue (database driver) |
| Process manager | Supervisor |
| Authentication | Laravel Breeze |
| Email sending | Laravel Mailer (Symfony Mailer) |

---

## 📦 Version History

| Version | Highlights |
|---------|-----------|
| v1.0.0 | Initial release — core campaign & contact management |
| v1.1.0 | LeadGenify Pro rebrand; SMTP encryption; Quill editor sync fixes |
| v1.2.0 | Security hardening, rate limiting, Supervisor config |
| v1.3.0 | Rich account-scoped dashboard with Chart.js |
| v1.4.0 | Branded unsubscribe footer & List-Unsubscribe headers |
| v1.5.0 | Email Templates Library with campaign integration |
| v1.6.0 | Code refactoring; centralised account ID; real error messages |
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

*Built with ❤️ by LeadGenify Pro*
