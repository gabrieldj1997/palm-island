async function handle(res) {
    if (!res.ok) {
        const data = await res.json().catch(() => ({}));
        return data
    }
    return res.json();
}

export async function createGameApi() {
    const res = await fetch('/api/games/create', {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest' 
        },
        credentials: 'include'
    })
    return handle(res)
}

export async function sendAction(gameId, payload) {
  const res = await fetch(`/api/games/${gameId}/actions`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(payload)
  })
  return handle(res)
}
