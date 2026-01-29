export async function startGame() {
  const res = await fetch('/api/games', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' }
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

async function handle(res) {
  const data = await res.json()
  if (!res.ok) throw new Error(data.error || 'Erro inesperado')
  return data
}
